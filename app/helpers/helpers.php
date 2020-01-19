<?php

function is_Active($routeName) {
    return null !== request()->segment(2) && request()->segment(2) == $routeName ? 'active' : '';
}

function getYoutubeUrl($url) {
    preg_match('%(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})%i', $url, $match);
    return isset($match[1]) ? $match[1] : '';
}
