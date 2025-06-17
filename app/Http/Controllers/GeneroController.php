<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index()
    {
        $generos = Genero::all();
        return view('generos.index', compact('generos'));
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Genero::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('generos.index')->with('success', 'Gênero criado com sucesso!');
    }

    public function edit($id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', compact('genero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $genero = Genero::findOrFail($id);
        $genero->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('generos.index')->with('success', 'Gênero atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();

        return redirect()->route('generos.index')->with('success', 'Gênero excluído com sucesso!');
    }
}
