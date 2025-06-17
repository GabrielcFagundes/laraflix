<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filme;

class FilmeController extends Controller
{
    public function index()
    {
        $filmes = Filme::with('user')->latest()->get();
        return view('filmes.index', compact('filmes'));
    }

    public function create()
    {
        return view('filmes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            'diretor' => 'required|string|max:255', // campo texto
            'nota' => 'required|numeric|between:0,10',
            'imagem' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // if ($request->hasFile('imagem')) {
        //     $imagePath = $request->file('imagem')->store('public/imagens');
        //     $validatedData['imagem'] = str_replace('public/', '', $imagePath);
        // }

        $validatedData['user_id'] = auth()->id();

        Filme::create($validatedData);

        return redirect()->route('filmes.index')->with('success', 'Filme cadastrado com sucesso!');
    }

    public function show(Filme $filme)
    {
        $filme->load('comentarios');
        return view('filmes.show', compact('filme'));
    }

    public function edit($id)
    {
        $filme = Filme::findOrFail($id);

        if ($filme->user_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado');
        }

        return view('filmes.edit', compact('filme'));
    }

    public function update(Request $request, $id)
    {
        $filme = Filme::findOrFail($id);

        if ($filme->user_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado');
        }

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:255',
            'diretor' => 'required|string|max:255', // texto livre
            'nota' => 'required|numeric|between:0,10',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('imagem')) {
            $imagePath = $request->file('imagem')->store('public/imagens');
            $validatedData['imagem'] = str_replace('public/', '', $imagePath);
        }

        $filme->update($validatedData);

        return redirect()->route('filmes.index')->with('success', 'Filme atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $filme = Filme::findOrFail($id);

        if ($filme->user_id !== auth()->id()) {
            abort(403, 'Acesso não autorizado');
        }

        $filme->delete();

        return redirect()->route('filmes.index')->with('success', 'Filme excluído com sucesso!');
    }
}
