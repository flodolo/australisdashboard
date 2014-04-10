<?php
if (!defined('INIT')) die;
?>
    <table class="table sortable">
        <caption>L10n Mini Dashboard for Australis</caption>
        <thead>
            <tr>
                <th class="automated">Locale</th>

<?php
// Get all locales from Australis pages list
$locales = [];
foreach ($pages as $page) {
    $jsonString = $langcheckerURL . '&file=' . $page;
    $arr = getJsonArray(cacheUrl($jsonString))[$page];
    foreach ($arr as $key => $val) {
        if (in_array($key, $locales)) {
            continue;
        }
        $locales[] = $key;
    }

}

// Get status from all locales for each page
foreach ($pages as $page) {
    $jsonString = $langcheckerURL . '&file=' . $page;
    $arr = getJsonArray(cacheUrl($jsonString))[$page];
    foreach ($locales as $locale) {
        if (in_array($locale, array_keys($arr))) {
            $status[$locale][$page] = $arr[$locale];
            continue;
        }
        $status[$locale][$page] = 'none';
    }
}

// Display columns name
foreach ($pages as $page) {
    echo '<td>' . $page . '</td>';
}
?>

            </tr>
        </thead>
        <tbody>

<?php
// Display status for all pages per locale
$totalPage = count($pages);
$totalLocale = count($locales);
$localeDone=0;
foreach ($status as $localeStatus => $statusVal) {
    $pageDone=0;
    echo '<tr>' . "\n";
    echo '<td>' . $localeStatus . '</td>' . "\n";
    foreach ($statusVal as $key => $result) {
        $cell = $class = '';

        // This locale do not have this page
        if ($result == 'none') {
            $class = 'none';
        }else {
            // Page done
            if ($result['Identical'] == 0 && $result['Missing'] == 0) {
                    $cell = '100&thinsp;%';
                    $class .= ' done';
                    $pageDone++;

            // Missing
            } elseif ($result['Translated'] == 0) {
                $cell = '0&thinsp;%';
                $class .= ' missing';

            // In progress
            } else {
                $count = $result['Translated'] + $result['Missing']
                    + $result['Identical'];
                $cell = $result['Translated'] . '/' . $count;
                $class .= ' inprogress';
            }
        }
        echo '<td class="' . $class . '">' . $cell . '</td>' . "\n";
    }
    echo '</tr>' . "\n";
    if ($pageDone == $totalPage)
    {
        $localeDone++;
    }
}

// Display bottom statistics
$percentLocaleDone = round($localeDone / $totalLocale * 100, 2);
$totalCol = $totalPage + 1;
echo '<tr><td colspan="' . $totalCol. '">' . $localeDone . ' perfect locales /'
    . $totalLocale . ' (' . $percentLocaleDone . '&thinsp;%)</td></tr>';
echo '</tbody>';
echo '</table>';
?>
