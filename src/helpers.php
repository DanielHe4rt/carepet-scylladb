<?php


if (!function_exists('basePath')) {
    function basePath(string $path = '')
    {
        $directoryPieces = explode('src', __DIR__);
        return $directoryPieces[0] . $path;
    }
}