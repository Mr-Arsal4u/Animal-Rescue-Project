<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConsultationController extends Controller
{
    public function create()
    {
        return view('consultation.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
            'agreement' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $consultation = Consultation::create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_phone' => $request->client_phone,
            'pet_name' => $request->pet_name,
            'pet_type' => $request->pet_type,
            'pet_breed' => $request->pet_breed,
            'pet_age' => $request->pet_age,
            'consultation_type' => $request->consultation_type,
            'symptoms_description' => $request->symptoms_description,
            'emergency_contact' => $request->emergency_contact,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'additional_notes' => $request->additional_notes,
            'status' => 'pending',
        ]);

        return redirect()->route('consultation.create')
            ->with('success', 'Your consultation request has been submitted successfully! We will contact you within 24 hours to confirm your appointment.');
    }
}
