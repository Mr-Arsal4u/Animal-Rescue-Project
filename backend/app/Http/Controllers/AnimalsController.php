<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\AnimalStatus;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function index()
    {
        $animals = Animal::where('status', AnimalStatus::AVAILABLE->value)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('animals.index', compact('animals'));
    }

    public function show(Animal $animal)
    {
        if (!$animal) {
            abort(404, 'Animal not found');
        }
        return view('animals.show', compact('animal'));
    }
}
