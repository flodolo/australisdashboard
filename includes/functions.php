<?php
if (!defined('INIT')) die;

// Utility functions for the Dashboard

function getJsonArray($url) {
    return json_decode(file_get_contents($url), true);
}

function cacheUrl($url, $time = CACHE_EXPIRE)
{
    $cache = CACHE . sha1($url) . '.cache';
    if (is_file($cache)) {
        $age = $_SERVER['REQUEST_TIME'] - filemtime($cache);
        if ($age < $time) {
            return $cache;
        }
    }

    $file = file_get_contents($url);
    file_put_contents($cache, $file);
    return $cache;
}
