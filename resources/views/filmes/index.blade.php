@extends('layouts.app')

@section('content')
@php use Illuminate\Support\Facades\Storage; @endphp

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>🎬 Filmes</h1>
        <a href="{{ route('filmes.index') }}" class="btn btn-outline-dark">🎮 Jogos</a>
    </div>

    @foreach ($filmes as $filme)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $filme->titulo }}</h5>
                <p class="card-text">{{ $filme->subtitulo }}</p>

                <p class="card-text"><strong>Nota:</strong> {{ $filme->nota }}/10</p>
                <p class="card-text"><strong>Diretor:</strong> {{ $filme->diretor }}</p>
                <p class="card-text">
                    <small class="text-muted">Postado por: {{ $filme->user->name ?? 'Anônimo' }}</small>
                </p>

                @if ($filme->imagem && Storage::exists($filme->imagem))
                    <img src="{{ Storage::url($filme->imagem) }}" class="img-fluid mt-2 rounded" alt="Capa do filme" style="max-height: 300px;">
                @else
                    <p class="text-muted mt-2">Imagem não disponível.</p>
                @endif

                <a href="{{ route('filmes.show', $filme->id) }}" class="btn btn-outline-secondary mt-3">
                    Ver detalhes e comentar
                </a>

                @auth
                    @if ($filme->user_id === auth()->id())
                        <div class="mt-3">
                            <a href="{{ route('filmes.edit', $filme->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            <form action="{{ route('filmes.destroy', $filme->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
    @endforeach
</div>
@endsection
