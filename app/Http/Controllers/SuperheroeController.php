<?php

namespace App\Http\Controllers;

use App\Superheroe;
use Illuminate\Http\Request;

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
            'photo_url' => 'required|url',
            'additional_info' => 'required|string'
        ]);

        Superheroe::create($request->all());

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
            'photo_url' => 'required|url',
            'additional_info' => 'required|string'
        ]);

        $superheroe->update($request->all());

        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe actualizado');
    }

    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();
        return redirect()->route('superheroes.index')
            ->with('success', 'Superhéroe eliminado');
    }
}
