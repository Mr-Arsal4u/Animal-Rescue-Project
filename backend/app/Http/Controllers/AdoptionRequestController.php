<?php

namespace App\Http\Controllers;

use App\Models\AdoptionRequest;
use App\Models\Animal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdoptionRequestController extends Controller
{
    public function create(Animal $animal)
    {
        return view('adoption.create', compact('animal'));
    }

    public function store(Request $request, Animal $animal)
    {
        $validator = Validator::make($request->all(), [
            'adopter_name' => 'required|string|max:255',
            'adopter_email' => 'required|email|max:255',
            'adopter_phone' => 'required|string|max:20',
            'adopter_address' => 'required|string|max:500',
            'adopter_age' => 'required|integer|min:18',
            'adopter_occupation' => 'required|string|max:255',
            'adopter_experience' => 'required|boolean',
            'adopter_family_size' => 'required|integer|min:1',
            'adopter_housing_type' => 'required|string|max:500',
            'adopter_other_pets' => 'nullable|string|max:500',
            'adopter_reason' => 'required|string|max:1000',
            'adopter_commitment' => 'required|string|max:1000',
            'agreement' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $adoptionRequest = AdoptionRequest::create([
            'animal_id' => $animal->id,
            'adopter_name' => $request->adopter_name,
            'adopter_email' => $request->adopter_email,
            'adopter_phone' => $request->adopter_phone,
            'adopter_address' => $request->adopter_address,
            'adopter_age' => $request->adopter_age,
            'adopter_occupation' => $request->adopter_occupation,
            'adopter_experience' => $request->adopter_experience,
            'adopter_family_size' => $request->adopter_family_size,
            'adopter_housing_type' => $request->adopter_housing_type,
            'adopter_other_pets' => $request->adopter_other_pets,
            'adopter_reason' => $request->adopter_reason,
            'adopter_commitment' => $request->adopter_commitment,
            'status' => 'pending',
        ]);

        return redirect()->route('animals.show', $animal)
            ->with('success', 'Your adoption request has been submitted successfully! We will contact you soon.');
    }
}
