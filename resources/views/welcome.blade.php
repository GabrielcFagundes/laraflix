@extends('layouts.app')

@section('title', 'Bem-vindo ao CineDebate')

@section('content')
    <div class="text-center mt-5">
        <h1 class="mb-4">🎬 Bem-vindo ao CineJogosDebate!</h1>
        <p class="mb-4">Explore, avalie e comente sobre seus filmes, jogos e séries favoritos.</p>

        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary">Registrar</a>

        <hr class="my-5">

        <a href="{{ route('filmes.index') }}" class="btn btn-success">Ver Filmes</a>
        <a href="{{ route('filmes.index') }}" class="btn btn-success">Ver Jogos</a>
    </div>
@endsection
