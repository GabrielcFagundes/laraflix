@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gêneros</h1>

    <a href="{{ route('generos.create') }}" class="btn btn-primary mb-3">➕ Novo Gênero</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($generos->isEmpty())
        <p>Nenhum gênero cadastrado.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($generos as $genero)
                <tr>
                    <td>{{ $genero->nome }}</td>
                    <td>
                        <a href="{{ route('generos.edit', $genero->id) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                        <form action="{{ route('generos.destroy', $genero->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este gênero?')">🗑️ Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
