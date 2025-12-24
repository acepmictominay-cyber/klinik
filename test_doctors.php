<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$doctors = App\Models\Doctor::all();
echo "Doctors count: " . $doctors->count() . "\n";
foreach ($doctors as $d) {
    echo $d->id . ': ' . $d->nama . "\n";
}