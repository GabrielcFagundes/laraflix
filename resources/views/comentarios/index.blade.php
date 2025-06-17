--- resources/views/comentarios/index.blade.php ---

@extends('layouts.app')

@section('content')
public function index()
{
    $comentarios = \App\Models\Comentario::with('filme')->get();
    return view('comentarios.index', compact('comentarios'));
}

<div class="container">
    <h1>Comentários</h1>
    <a href="{{ route('comentarios.create') }}" class="btn btn-primary mb-3">Novo Comentário</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Filme</th>
                <th>Autor</th>
                <th>Comentário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario)
                <tr>
                    <td>{{ $comentario->filme->titulo }}</td>
                    <td>{{ $comentario->autor }}</td>
                    <td>{{ $comentario->conteudo }}</td>
                    <td>
                        <a href="{{ route('comentarios.edit', $comentario) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('comentarios.destroy', $comentario) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

--- resources/views/comentarios/create.blade.php ---

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Comentário</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="filme_id" class="form-label">Filme</label>
            <select name="filme_id" class="form-select" required>
                @foreach($filmes as $filme)
                    <option value="{{ $filme->id }}">{{ $filme->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ old('autor') }}" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Comentário</label>
            <textarea name="conteudo" class="form-control" rows="4" required>{{ old('conteudo') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection

--- resources/views/comentarios/edit.blade.php ---

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Comentário</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comentarios.update', $comentario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="filme_id" class="form-label">Filme</label>
            <select name="filme_id" class="form-select" required>
                @foreach($filmes as $filme)
                    <option value="{{ $filme->id }}" {{ $comentario->filme_id == $filme->id ? 'selected' : '' }}>{{ $filme->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ old('autor', $comentario->autor) }}" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Comentário</label>
            <textarea name="conteudo" class="form-control" rows="4" required>{{ old('conteudo', $comentario->conteudo) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
