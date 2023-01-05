<?php


if (!function_exists('basePath')) {
    function basePath(string $path = '')
    {
        $directoryPieces = explode('src', __DIR__);
        return substr($directoryPieces[0], 0, -1) . $path;
    }
}