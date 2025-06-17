<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;
use App\Models\Filme;
use Illuminate\Support\Facades\Auth;

class AvaliacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Garante que só usuários autenticados acessem
    }

    public function index()
    {
        $avaliacoes = Avaliacao::with('filme', 'user')->get();
        return view('avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        $filmes = Filme::all();
        return view('avaliacoes.create', compact('filmes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'filme_id' => 'required|exists:filmes,id',
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        Avaliacao::create([
            'filme_id' => $request->filme_id,
            'user_id' => Auth::id(),
            'nota' => $request->nota,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação criada com sucesso!');
    }

    public function edit($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        if ($avaliacao->user_id !== Auth::id()) {
            abort(403); // Impede edição por outro usuário
        }

        $filmes = Filme::all();
        return view('avaliacoes.edit', compact('avaliacao', 'filmes'));
    }

    public function update(Request $request, $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        if ($avaliacao->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'filme_id' => 'required|exists:filmes,id',
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        $avaliacao->update([
            'filme_id' => $request->filme_id,
            'nota' => $request->nota,
            'comentario' => $request->comentario,
        ]);

        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        if ($avaliacao->user_id !== Auth::id()) {
            abort(403);
        }

        $avaliacao->delete();

        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação excluída com sucesso!');
    }
}
