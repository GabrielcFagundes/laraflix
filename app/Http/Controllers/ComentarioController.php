<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'filme_id' => 'required|exists:filmes,id',
            'conteudo' => 'required|string|max:1000',
            'comentario_pai_id' => 'nullable|exists:comentarios,id', // nome correto
        ]);

        Comentario::create([
            'filme_id' => $request->filme_id,
            'user_id' => auth()->id(), // ou null se anônimo
            'comentario_pai_id' => $request->comentario_pai_id, // certinho
            'conteudo' => $request->conteudo,
            'autor' => auth()->check() ? auth()->user()->name : $request->autor,
        ]);

        return back()->with('success', 'Comentário enviado!');
    }
}
