@extends('layouts.app')

@section('title', 'Editar Filme')

@section('content')
    <h1 class="mb-4">Editar Filme</h1>

    <form action="{{ route('filmes.update', $filme->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $filme->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo</label>
            <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="{{ old('subtitulo', $filme->subtitulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="diretor" class="form-label">Diretor</label>
            <input type="text" class="form-control" id="diretor" name="diretor" value="{{ old('diretor', $filme->diretor) }}" required>
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota (0 a 10)</label>
            <input type="number" class="form-control" id="nota" name="nota" min="0" max="10" step="0.1" value="{{ old('nota', $filme->nota) }}" required>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem (opcional)</label>
            <input type="file" class="form-control" id="imagem" name="imagem">
            @if ($filme->imagem)
                <p class="mt-2">Imagem atual:</p>
                <img src="{{ asset('storage/' . $filme->imagem) }}" width="150" alt="Imagem atual do filme">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
