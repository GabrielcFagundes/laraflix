@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Diretor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('diretores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('diretores.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
