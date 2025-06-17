@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">🎬 Painel Principal</h1>

    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('filmes.create') }}" class="btn btn-primary w-100">➕ Postar Filme</a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('filmes.index') }}" class="btn btn-dark w-100">🎞️ Ver Todos os Filmes</a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="{{ route('filmes.index') }}" class="btn btn-success w-100">📂 Gerenciar Gêneros</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('filmes.index') }}" class="btn btn-warning w-100">🎥 Gerenciar Diretores</a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('filmes.index') }}" class="btn btn-secondary w-100">⭐ Gerenciar Avaliações</a>
        </div>
    </div>
</div>
@endsection
