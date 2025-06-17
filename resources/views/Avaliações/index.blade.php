@extends('layouts.app')

@section('content')
<div class="container">
    <h1>⭐ Avaliações</h1>
    <a href="{{ route('avaliacoes.create') }}" class="btn btn-primary mb-3">Nova Avaliação</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Filme</th>
                <th>Usuário</th>
                <th>Nota</th>
                <th>Comentário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($avaliacoes as $avaliacao)
                <tr>
                    <td>{{ $avaliacao->filme->titulo }}</td>
                    <td>{{ $avaliacao->user->name }}</td>
                    <td>{{ $avaliacao->nota }}</td>
                    <td>{{ $avaliacao->comentario }}</td>
                    <td>
                        <a href="{{ route('avaliacoes.edit', $avaliacao->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('avaliacoes.destroy', $avaliacao->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Tem certeza?')" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
