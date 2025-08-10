<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function create()
    {
        $doctors = Doctor::where('status', 'active')->get();
        return view('appointment.create', compact('doctors'));
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
            'appointment_type' => 'required|string|max:100',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required|string|max:100',
            'reason' => 'required|string|max:1000',
            'emergency_contact' => 'required|string|max:255',
            'additional_notes' => 'nullable|string|max:500',
            'agreement' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $appointment = Appointment::create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'client_phone' => $request->client_phone,
            'pet_name' => $request->pet_name,
            'pet_type' => $request->pet_type,
            'pet_breed' => $request->pet_breed,
            'pet_age' => $request->pet_age,
            'appointment_type' => $request->appointment_type,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'appointment_time' => $request->appointment_time,
            'reason' => $request->reason,
            'emergency_contact' => $request->emergency_contact,
            'additional_notes' => $request->additional_notes,
            'status' => 'pending',
        ]);

        return redirect()->route('appointment.create')
            ->with('success', 'Your appointment request has been submitted successfully! We will contact you within 24 hours to confirm your appointment.');
    }
}
