<?php
if (!defined('INIT')) die;

// Fetch external data source
$langchecker        = 'http://l10n.mozilla-community.org/~pascalc/langchecker/';

$langcheckerURL = $langchecker . '?locale=all&website=0&json';

// This is the list of the tracked pages
$pages = [
    'firefox/desktop/index.lang',
    'firefox/desktop/fast.lang',
    'firefox/desktop/trust.lang',
    'firefox/desktop/customize.lang',
    'firefox/australis/firefox_tour.lang',
    'firefox/sync.lang',
    ];
