<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Test API route to verify API functionality
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});

// Animals API routes
Route::get('/animals', function () {
    return \App\Models\Animal::all();
});

Route::get('/animals/{animal}', function (\App\Models\Animal $animal) {
    return $animal;
});
