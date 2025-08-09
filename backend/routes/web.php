<?php

use Illuminate\Support\Facades\Route;

// Root path for React app
Route::get('/', function () {
    return view('app');
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
