<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuccessStoriesController;

// Root path for backend home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Superadmin login page route
Route::get('/superadmin/login', function () {
    return view('app');
});

// Frontend routes
Route::get('/stories', [SuccessStoriesController::class, 'index']);

Route::get('/animals', [App\Http\Controllers\AnimalsController::class, 'index'])->name('animals.index');

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
// Store appointment form route
Route::post('/appointments', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointments.store');

// Adoption routes
Route::get('/adoption/{animal}/create', [App\Http\Controllers\AdoptionRequestController::class, 'create'])->name('adoption.create');
Route::post('/adoption/{animal}', [App\Http\Controllers\AdoptionRequestController::class, 'store'])->name('adoption.store');

// Route::get('/admin/adoption-requests', [App\Http\Controllers\AdoptionRequestsController::class, 'index']);

require __DIR__.'/auth.php';
