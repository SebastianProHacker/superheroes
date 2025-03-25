<?php

namespace App\Http\Controllers;

use App\Superheroe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperheroeController extends Controller
{
    public function index()
    {
        $superheroes = Superheroe::all();
        return view('superheroes.index', compact('superheroes'));
    }

    public function create()
    {
        return view('superheroes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'real_name' => 'required|string|max:255',
            'superhero_name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB máximo
            'additional_info' => 'required|string'
        ]);

        $path = $request->file('photo')->store('public/superheroes');

        Superheroe::create([
            'real_name' => $request->real_name,
            'superhero_name' => $request->superhero_name,
            'photo_url' => str_replace('public/', '', $path),
            'additional_info' => $request->additional_info
        ]);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe creado con éxito');
    }
    public function show(Superheroe $superheroe)
    {
        return view('superheroes.show', compact('superheroe'));
    }

    public function edit(Superheroe $superheroe)
    {
        return view('superheroes.edit', compact('superheroe'));
    }

    public function update(Request $request, Superheroe $superheroe)
    {
        $request->validate([
            'real_name' => 'required|string|max:255',
            'superhero_name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_info' => 'required|string'
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/superheroes');
            $data['photo_url'] = str_replace('public/', '', $path);
        }

        $superheroe->update($data);

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe actualizado');
    }

    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();
        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe eliminado');
    }
    public function trashed()
    {
        $superheroes = Superheroe::onlyTrashed()->get();
        return view('superheroes.trashed', compact('superheroes'));
    }

    public function restore($id)
    {
        $superheroe = Superheroe::withTrashed()->findOrFail($id);
        $superheroe->restore();
        
        return redirect()->route('superheroes.trashed')
            ->with('success', 'Superhéroe restaurado');
    }
}
