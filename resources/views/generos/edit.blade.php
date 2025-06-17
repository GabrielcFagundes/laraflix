@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Gênero</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('generos.update', $genero->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Gênero</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $genero->nome) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">💾 Atualizar</button>
        <a href="{{ route('generos.index') }}" class="btn btn-secondary">↩️ Voltar</a>
    </form>
</div>
@endsection
