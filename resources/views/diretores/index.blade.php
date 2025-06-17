@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Diretores</h1>
    <a href="{{ route('diretores.create') }}" class="btn btn-primary mb-3">Novo Diretor</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diretores as $diretor)
                <tr>
                    <td>{{ $diretor->id }}</td>
                    <td>{{ $diretor->nome }}</td>
                    <td>
                        <a href="{{ route('diretores.edit', $diretor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('diretores.destroy', $diretor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
