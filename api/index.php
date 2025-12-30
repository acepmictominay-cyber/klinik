<?php

// Run migrations on first deployment
if (!file_exists(__DIR__ . '/../storage/app/migrated.lock')) {
    try {
        require __DIR__ . '/../vendor/autoload.php';

        $app = require_once __DIR__ . '/../bootstrap/app.php';

        $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

        // Run migrations
        $kernel->call('migrate', ['--force' => true]);

        // Create migrated lock file
        file_put_contents(__DIR__ . '/../storage/app/migrated.lock', 'migrated');

    } catch (Exception $e) {
        // Log error but continue
        error_log('Migration error: ' . $e->getMessage());
    }
}

require __DIR__. '/../public/index.php';