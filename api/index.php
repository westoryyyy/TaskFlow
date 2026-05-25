<?php

// Vercel serverless environment is read-only except for /tmp.
// We override the storage paths so Laravel can write compiled views, cache, and sessions.
$storagePath = '/tmp/storage';
$subDirs = ['/framework/views', '/framework/cache', '/framework/sessions', '/framework/testing', '/app', '/logs'];

foreach ($subDirs as $dir) {
    if (!is_dir($storagePath . $dir)) {
        mkdir($storagePath . $dir, 0755, true);
    }
}

// Set environment variables for storage paths so Laravel uses /tmp for compiled views
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");

// Forward request to Laravel's main index.php
require __DIR__ . '/../public/index.php';
