@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Postar Novo Filme</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('filmes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo</label>
            <input type="text" name="subtitulo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="diretor" class="form-label">Diretor</label>
            <input type="text" name="diretor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota (0-10)</label>
            <input type="number" name="nota" class="form-control" min="0" max="10" step="0.1" required>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem</label>
            <input type="file" name="imagem" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Postar</button>
    </form>
</div>
@endsection
