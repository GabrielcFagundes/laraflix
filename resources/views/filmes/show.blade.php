@extends('layouts.app')

@section('title', 'Detalhes do Filme')

@section('content')
@php use Illuminate\Support\Facades\Storage; @endphp

<div class="container">
    @isset($filme)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h2 class="mb-3">{{ $filme->titulo }}</h2>
                <p class="mb-1"><strong>Diretor:</strong> {{ $filme->diretor }}</p>
                <p class="mb-1"><strong>Nota:</strong> {{ $filme->nota }}/10</p>
                <p class="mb-3"><strong>Comentário:</strong> {{ $filme->subtitulo }}</p>

                @if ($filme->imagem && Storage::exists($filme->imagem))
                    <img src="{{ Storage::url($filme->imagem) }}" alt="Capa" class="img-fluid rounded mb-3" style="max-width: 400px;">
                @else
                    <p class="text-muted">Imagem não disponível.</p>
                @endif
            </div>
        </div>

        {{-- Comentários --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-3">Comentários</h4>

                @forelse($filme->comentarios as $comentario)
                    <div class="border-start border-3 ps-3 mb-3">
                        <p class="mb-1"><strong>{{ $comentario->user->name ?? $comentario->autor }}:</strong></p>
                        <p class="mb-1">{{ $comentario->conteudo }}</p>
                        <small class="text-muted">{{ $comentario->created_at->format('d/m/Y H:i') }}</small>

                        {{-- Respostas --}}
                        @foreach ($comentario->respostas as $resposta)
                            <div class="ms-4 mt-3 border-start border-secondary ps-3">
                                <p class="mb-1"><strong>{{ $resposta->user->name ?? $resposta->autor }}:</strong></p>
                                <p class="mb-1">{{ $resposta->conteudo }}</p>
                                <small class="text-muted">{{ $resposta->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                        @endforeach

                        {{-- Formulário de resposta --}}
                        @auth
                            <form action="{{ route('comentarios.store') }}" method="POST" class="mt-2 ms-3">
                                @csrf
                                <input type="hidden" name="filme_id" value="{{ $filme->id }}">
                                <input type="hidden" name="comentario_pai_id" value="{{ $comentario->id }}">

                                <div class="input-group">
                                    <textarea name="conteudo" class="form-control" placeholder="Responder..." rows="2" required></textarea>
                                    <button type="submit" class="btn btn-outline-primary">Responder</button>
                                </div>
                            </form>
                        @endauth
                    </div>
                @empty
                    <p class="text-muted">Nenhum comentário ainda.</p>
                @endforelse

                {{-- Novo comentário --}}
                @auth
                    <hr>
                    <h5>Adicionar Comentário</h5>
                    <form action="{{ route('comentarios.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="filme_id" value="{{ $filme->id }}">

                        <div class="mb-3">
                            <textarea class="form-control" name="conteudo" placeholder="Escreva seu comentário..." rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                @else
                    <div class="alert alert-info mt-3">
                        <a href="{{ route('login') }}">Faça login</a> para comentar.
                    </div>
                @endauth
            </div>
        </div>
    @else
        <div class="alert alert-danger">Filme não encontrado!</div>
    @endisset
</div>
@endsection
