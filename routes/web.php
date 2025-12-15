<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/doctors', function () {
    return view('admin.doctors');
})->name('admin.doctors');

Route::get('/admin/medicines', function () {
    return view('admin.medicines');
})->name('admin.medicines');

Route::get('/admin/clinic', function () {
    return view('admin.clinic');
})->name('admin.clinic');
