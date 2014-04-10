<?php
if (!defined('INIT')) die;

// Fetch external data source
$langchecker        = 'http://l10n.mozilla-community.org/~pascalc/langchecker/';

// This is the list of the tracked pages
$langcheckerURL = $langchecker . '?locale=all&json';

// This is the list of the tracked pages
$pages = [
    ['file' => 'firefox/desktop/index.lang',
     'site' => '0',
    ],
    ['file' => 'firefox/desktop/fast.lang',
     'site' => '0',
    ],
    ['file' => 'firefox/desktop/trust.lang',
     'site' => '0',
    ],
    ['file' => 'firefox/desktop/customize.lang',
     'site' => '0',
    ],
    ['file' => 'firefox/australis/firefox_tour.lang',
     'site' => '0',
    ],
    ['file' => 'firefox/sync.lang',
     'site' => '0',
    ],
     ['file' => 'apr2014.lang',
     'site' => '6',
    ],
];
