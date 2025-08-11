<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\AnimalStatus;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function index(Request $request)
    {
        $query = Animal::where('status', AnimalStatus::AVAILABLE->value);

        // Handle search
        if ($request->filled('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('breed', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Handle category filter
        if ($request->filled('category') && $request->get('category') !== '') {
            $query->where('type', $request->get('category'));
        }

        // Handle age filter
        if ($request->filled('age')) {
            $age = $request->get('age');
            switch ($age) {
                case 'young':
                    $query->where('age', '<=', 2);
                    break;
                case 'adult':
                    $query->whereBetween('age', [3, 8]);
                    break;
                case 'senior':
                    $query->where('age', '>=', 9);
                    break;
            }
        }

        // Handle size filter
        if ($request->filled('size')) {
            $query->where('size', $request->get('size'));
        }

        $animals = $query->orderBy('featured', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->paginate(12)
                        ->withQueryString();

        // Get unique animal types for category filter
        $animalTypes = Animal::distinct()->pluck('type')->filter()->values();

        return view('animals.index', compact('animals', 'animalTypes'));
    }

    public function show(Animal $animal)
    {
        if (!$animal) {
            abort(404, 'Animal not found');
        }
        return view('animals.show', compact('animal'));
    }
}
