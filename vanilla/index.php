<?php

require __DIR__ . '/vendor/autoload.php';

$isFrankenPHP = function_exists('frankenphp_handle_request');

if ($isFrankenPHP) {
    // If running in FrankenPHP, include the worker script and exit
    require_once __DIR__ . '/worker.php';
    exit;
}

// Otherwise, include the routes configuration
require __DIR__ . '/routes.php';
