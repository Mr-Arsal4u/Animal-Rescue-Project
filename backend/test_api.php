<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Test consultation creation
$consultationData = [
    'client_name' => 'Test User',
    'client_email' => 'test@example.com',
    'client_phone' => '1234567890',
    'pet_name' => 'Buddy',
    'pet_type' => 'dog',
    'pet_breed' => 'Golden Retriever',
    'pet_age' => 3,
    'consultation_type' => 'general_checkup',
    'symptoms_description' => 'Regular checkup needed',
    'emergency_contact' => 'Emergency Contact',
    'preferred_date' => '2025-01-20',
    'preferred_time' => 'Morning',
];

try {
    $consultation = \App\Models\Consultation::create($consultationData);
    echo "✅ Consultation created successfully!\n";
    echo "ID: " . $consultation->id . "\n";
    echo "Client: " . $consultation->client_name . "\n";
    echo "Pet: " . $consultation->pet_name . "\n";
} catch (Exception $e) {
    echo "❌ Error creating consultation: " . $e->getMessage() . "\n";
}

// Test appointment creation
$appointmentData = [
    'pet_name' => 'Fluffy',
    'pet_type' => 'cat',
    'pet_breed' => 'Persian',
    'pet_age' => 2,
    'owner_name' => 'Jane Doe',
    'owner_email' => 'jane@example.com',
    'owner_phone' => '0987654321',
    'appointment_date' => '2025-01-21',
    'appointment_time' => '14:00',
    'service_type' => 'vaccination',
    'urgency_level' => 2,
    'symptoms' => 'Annual vaccination needed',
    'notes' => 'First time visit',
];

try {
    $appointment = \App\Models\Appointment::create($appointmentData);
    echo "✅ Appointment created successfully!\n";
    echo "ID: " . $appointment->id . "\n";
    echo "Pet: " . $appointment->pet_name . "\n";
    echo "Owner: " . $appointment->owner_name . "\n";
} catch (Exception $e) {
    echo "❌ Error creating appointment: " . $e->getMessage() . "\n";
}

echo "\n🎉 API test completed!\n";
