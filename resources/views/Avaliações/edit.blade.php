@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Avaliação</h1>

    <form action="{{ route('avaliacoes.update', $avaliacao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="filme_id" class="form-label">Filme</label>
            <select name="filme_id" class="form-select">
                @foreach($filmes as $filme)
                    <option value="{{ $filme->id }}" @selected($filme->id == $avaliacao->filme_id)>
                        {{ $filme->titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nota" class="form-label">Nota (1 a 5)</label>
            <input type="number" name="nota" min="1" max="5" class="form-control" value="{{ $avaliacao->nota }}" required>
        </div>

        <div class="mb-3">
            <label for="comentario" class="form-label">Comentário</label>
            <textarea name="comentario" class="form-control" rows="4">{{ $avaliacao->comentario }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
