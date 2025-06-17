@extends('layouts.app')

@section('title', 'Cadastrar Novo Filme')

@section('content')
    <h1 class="mb-4">Cadastrar Novo Filme</h1>

    <form action="{{ route('filmes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="ano" class="form-label">Ano de Lançamento</label>
            <input type="number" class="form-control" id="ano" name="ano" required>
        </div>

        <div class="mb-3">
            <label for="diretor" class="form-label">Diretor</label>
            <input type="text" class="form-control" id="diretor" name="diretor" required>
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota (1 a 5)</label>
            <input type="number" class="form-control" id="nota" name="nota" min="1" max="5" required>
        </div>

        <div class="mb-3">
            <label for="imagem_url" class="form-label">URL da Imagem</label>
            <input type="url" class="form-control" id="imagem_url" name="imagem_url" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
