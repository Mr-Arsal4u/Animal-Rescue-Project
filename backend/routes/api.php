<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminLoginController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Test API route to verify API functionality
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

// Test superadmin route
Route::get('/superadmin/test', function () {
    return response()->json([
        'message' => 'Superadmin API is accessible',
        'timestamp' => now(),
        'status' => 'success'
    ]);
});

// Superadmin login routes
Route::post('/superadmin/login', [SuperAdminLoginController::class, 'store'])
    ->middleware('guest')
    ->name('superadmin.login');

Route::post('/superadmin/logout', [SuperAdminLoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('superadmin.logout');

// Animals API routes
Route::get('/animals', function () {
    return \App\Models\Animal::all();
});

Route::get('/animals/{animal}', function (\App\Models\Animal $animal) {
    return $animal;
});
