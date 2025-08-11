<?php

use Illuminate\Support\Facades\Route;

// Root path for backend home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Superadmin login page route
Route::get('/superadmin/login', function () {
    return view('app');
});

// Frontend routes
Route::get('/stories', [App\Http\Controllers\StoriesController::class, 'index']);

Route::get('/process', [App\Http\Controllers\ProcessController::class, 'index']);

Route::get('/animals', [App\Http\Controllers\AnimalsController::class, 'index']);

// Animal details page route
Route::get('/animals/{animal}', [App\Http\Controllers\AnimalsController::class, 'show'])->name('animals.show');

Route::get('/medical-services', [App\Http\Controllers\MedicalServicesController::class, 'index']);

Route::get('/medical-team', [App\Http\Controllers\MedicalTeamController::class, 'index']);

Route::get('/success-stories', [App\Http\Controllers\SuccessStoriesController::class, 'index']);

Route::get('/doctors', [App\Http\Controllers\DoctorsController::class, 'index']);

// Book Consultation page route
Route::get('/consultations/create', [App\Http\Controllers\ConsultationController::class, 'create'])->name('consultations.create');
// Store consultation form route
Route::post('/consultations', [App\Http\Controllers\ConsultationController::class, 'store'])->name('consultations.store');
// Book Appointment page route
Route::get('/appointments/create', [App\Http\Controllers\AppointmentController::class, 'create'])->name('appointments.create');

// Route::get('/admin/adoption-requests', [App\Http\Controllers\AdoptionRequestsController::class, 'index']);

require __DIR__.'/auth.php';
