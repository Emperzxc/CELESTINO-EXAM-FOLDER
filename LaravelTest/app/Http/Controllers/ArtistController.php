<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::all();

        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'zip_code' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:artists|max:255',
            'email' => 'required|string|email|unique:artists|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        $artist = new Artist([
            'zip_code' => $request->input('zip_code'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        
        $artist->save();

        return redirect()->route('artists.index')
            ->with('success', 'Artist created successfully.');
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'zip_code' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:artists,username,' . $artist->id . '|max:255',
            'email' => 'required|string|email|unique:artists,email,' . $artist->id . '|max:255',
            'password' => 'nullable|string|min:8|max:255',
        ]);

        $artist->update([
            'zip_code' => $request->input('zip_code'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password') ? Hash::make($request->input('password')) : $artist->password,
        ]);

        return redirect()->route('artists.index')
            ->with('success', 'Artist updated successfully.');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('artists.index')
            ->with('success', 'Artist deleted successfully.');
    }
}

