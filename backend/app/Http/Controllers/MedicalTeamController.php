<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Doctor;

class MedicalTeamController extends Controller
{
    public function index()
    {
        // Get all active doctors, ordered by experience and then by name
        $doctors = Doctor::active()
            ->orderBy('experience_years', 'desc')
            ->orderBy('name', 'asc')
            ->get();

        return view('medical-team', compact('doctors'));
    }
}
