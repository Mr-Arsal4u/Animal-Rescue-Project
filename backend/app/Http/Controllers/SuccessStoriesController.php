<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SuccessStory;
use App\Models\Animal;

class SuccessStoriesController extends Controller
{
    public function index()
    {
        // Get all published success stories, ordered by featured first, then by creation date
        $successStories = SuccessStory::published()
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Calculate dynamic statistics
        $totalStories = $successStories->count();
        $featuredStories = $successStories->where('featured', true)->count();
        $totalAnimals = Animal::count();
        $totalAdoptions = $successStories->count(); // Each success story represents an adoption

        return view('success-stories', compact('successStories', 'totalStories', 'featuredStories', 'totalAnimals', 'totalAdoptions'));
    }
}
