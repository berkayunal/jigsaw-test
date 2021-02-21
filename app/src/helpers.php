<?php

if (!function_exists('pageLink')) {
    function pageLink($path): string 
    {
        $baseUrl = rightTrimPath($GLOBALS['container']->config->get('baseUrl'));

        $path = leftTrimPath($path);
        $path = rightTrimPath($path);

        if ($path !== "") {
            $path .= "/";
        }

        return "{$baseUrl}/{$path}";
    }
}