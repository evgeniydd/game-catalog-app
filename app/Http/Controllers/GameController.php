<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();

        if ($request->has('reset')) {
            return redirect()->route('games.index');
        }
        
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('genre')) {
            $query->where('genre', $request->genre);
        }

        if ($request->filled('platform')) {
            $query->where('platform', $request->platform);
        }

        $games = $query->paginate(9);

        return view('games.index', compact('games'));
    }

    public function create()
    {
        return view('games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'platform' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        Game::create($data);

        return redirect()->route('games.index')->with('success', 'Game added successfully');
    }

    public function edit(Game $game)
    {
        return view('games.edit', compact('game'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'developer' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'release_date' => 'required|date',
            'platform' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('covers', 'public');
        }

        $game->update($data);

        return redirect()->route('games.index')->with('success', 'Game updated successfully');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('games.index')->with('success', 'Game deleted successfully');
    }
    
}