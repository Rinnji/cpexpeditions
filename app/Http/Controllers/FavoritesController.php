<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function index(Request $request)
    {
        $favorites = auth()->user()->favorites;
        return view('favorites.index', compact('favorites'));
    }
    public function store()
    {
        $attributes = request()->validate([
            'thesis_id' => ['required', 'exists:theses,id']
        ]);
        /** @var /App/Models/User */
        $user = auth()->user();
        $thesisId = $attributes['thesis_id'];

        // Check if the user and thesis already exist in favorites
        if (!$user->favorites()->where('thesis_id', $thesisId)->exists()) {
            $user->favorites()->attach($thesisId, ['created_at' => now(), 'updated_at' => now()]);
            return back()->with('status', 'favorite-added');
        }

        return back()->with('status', 'favorite-exists');
    }
}
