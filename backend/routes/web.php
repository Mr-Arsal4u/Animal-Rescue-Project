<?php

use Illuminate\Support\Facades\Route;

// Root path for backend home page
Route::get('/', function () {
    return view('home');
});

// Superadmin login page route
Route::get('/superadmin/login', function () {
    return view('app');
});

// Backend pages routes
Route::get('/medical-services', function () {
    return view('medical-services');
});

Route::get('/medical-team', function () {
    return view('medical-team');
});

Route::get('/success-stories', function () {
    return view('success-stories');
});

// Catch-all route for React app - this will handle all frontend routes
// like /animals, /stories, etc. while preserving API routes
Route::get('/{any}', function ($any) {
    // Don't handle API routes - let Laravel's API routes handle them
    if (str_starts_with($any, 'api')) {
        abort(404);
    }
    return view('app');
})->where('any', '^(?!api).*$');

require __DIR__.'/auth.php';
