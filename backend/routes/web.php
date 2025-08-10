<?php

use Illuminate\Support\Facades\Route;

// Root path for backend home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Superadmin login page route
Route::get('/superadmin/login', function () {
    return view('app');
});

// Frontend routes
Route::get('/stories', function () {
    return view('app');
});

Route::get('/process', function () {
    return view('app');
});

Route::get('/animals', function () {
    return view('app');
});

Route::get('/medical-services', function () {
    return view('app');
});

Route::get('/medical-team', function () {
    return view('app');
});

Route::get('/success-stories', function () {
    return view('app');
});

require __DIR__.'/auth.php';
