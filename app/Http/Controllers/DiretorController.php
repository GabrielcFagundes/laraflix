<?php

namespace App\Http\Controllers;

use App\Models\Diretor;
use Illuminate\Http\Request;

class DiretorController extends Controller
{
    public function index()
    {
        $diretores = Diretor::all();
        return view('diretores.index', compact('diretores'));
    }

    public function create()
    {
        return view('diretores.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Diretor::create($request->all());
        return redirect()->route('diretores.index')->with('success', 'Diretor cadastrado com sucesso!');
    }

    public function edit(Diretor $diretor)
    {
        return view('diretores.edit', compact('diretor'));
    }

    public function update(Request $request, Diretor $diretor)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $diretor->update($request->all());
        return redirect()->route('diretores.index')->with('success', 'Diretor atualizado com sucesso!');
    }

    public function destroy(Diretor $diretor)
    {
        $diretor->delete();
        return redirect()->route('diretores.index')->with('success', 'Diretor excluído com sucesso!');
    }
}
