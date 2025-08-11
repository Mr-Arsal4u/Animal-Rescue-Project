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
    ->name('api.superadmin.login');

Route::post('/superadmin/logout', [SuperAdminLoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('api.superadmin.logout');

// Animals API routes
Route::get('/animals', function () {
    return \App\Models\Animal::all();
});

Route::get('/animals/{animal}', function (\App\Models\Animal $animal) {
    return $animal;
});

// Success Stories API routes
Route::get('/success-stories', function () {
    return \App\Models\SuccessStory::published()->get();
});

Route::get('/success-stories/featured', function () {
    return \App\Models\SuccessStory::featured()->published()->get();
});

// Consultations API routes
Route::post('/consultations', function (Request $request) {
    $validated = $request->validate([
        'client_name' => 'required|string|max:255',
        'client_email' => 'required|email|max:255',
        'client_phone' => 'required|string|max:20',
        'pet_name' => 'required|string|max:255',
        'pet_type' => 'required|string|max:100',
        'pet_breed' => 'required|string|max:100',
        'pet_age' => 'required|integer|min:0|max:30',
        'consultation_type' => 'required|string|max:100',
        'symptoms_description' => 'required|string|max:1000',
        'emergency_contact' => 'required|string|max:255',
        'preferred_date' => 'required|date|after:today',
        'preferred_time' => 'required|string|max:100',
        'additional_notes' => 'nullable|string|max:500',
    ]);

    $validated['status'] = 'pending';
    $consultation = \App\Models\Consultation::create($validated);
    
    return response()->json([
        'message' => 'Consultation request submitted successfully',
        'consultation' => $consultation
    ], 201);
});

// Appointments API routes
Route::post('/appointments', function (Request $request) {
    $validated = $request->validate([
        'pet_name' => 'required|string|max:255',
        'pet_type' => 'required|string',
        'pet_breed' => 'required|string|max:255',
        'pet_age' => 'required|numeric|min:0',
        'owner_name' => 'required|string|max:255',
        'owner_email' => 'required|email|max:255',
        'owner_phone' => 'required|string|max:20',
        'appointment_date' => 'required|date|after:today',
        'appointment_time' => 'required',
        'service_type' => 'required|string',
        'urgency_level' => 'required|integer|min:1|max:5',
        'symptoms' => 'nullable|string',
        'notes' => 'nullable|string',
        'total_cost' => 'nullable|numeric|min:0',
        'payment_status' => 'nullable|string|in:pending,paid,partial',
    ]);

    $validated['status'] = 'pending';
    $appointment = \App\Models\Appointment::create($validated);
    
    return response()->json([
        'message' => 'Appointment request submitted successfully',
        'appointment' => $appointment
    ], 201);
});

// Adoption Requests API routes
Route::post('/adoption-requests', function (Request $request) {
    $validated = $request->validate([
        'animal_id' => 'required|exists:animals,id',
        'adopter_name' => 'required|string|max:255',
        'adopter_email' => 'required|email|max:255',
        'adopter_phone' => 'required|string|max:20',
        'adopter_address' => 'required|string',
        'adopter_age' => 'required|integer|min:18|max:100',
        'adopter_occupation' => 'required|string|max:255',
        'adopter_experience' => 'boolean',
        'adopter_family_size' => 'required|integer|min:1',
        'adopter_housing_type' => 'required|string',
        'adopter_other_pets' => 'nullable|string',
        'adopter_reason' => 'required|string',
        'adopter_commitment' => 'required|string',
    ]);

    $adoptionRequest = \App\Models\AdoptionRequest::create($validated);
    
    return response()->json([
        'message' => 'Adoption request submitted successfully',
        'adoption_request' => $adoptionRequest
    ], 201);
});
