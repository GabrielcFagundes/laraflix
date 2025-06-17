<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\DiretorController;
use App\Http\Controllers\AvaliacaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas públicas
Route::get('/filmes', [FilmeController::class, 'index'])->name('filmes.index');

// Evita erro com comentários.index
Route::get('/comentarios', function () {
    return redirect('/filmes');
})->name('comentarios.index');

// Rotas autenticadas
Route::middleware(['auth'])->group(function () {
    // Recursos protegidos
    Route::resource('filmes', FilmeController::class)->except(['index']);
    Route::resource('generos', GeneroController::class)->except(['show']);
    Route::resource('diretores', DiretorController::class)->except(['show']);
    Route::resource('comentarios', ComentarioController::class)->only(['store']);
    Route::resource('avaliacoes', AvaliacaoController::class);

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Essa rota deve vir depois do resource
Route::get('/filmes/{filme}', [FilmeController::class, 'show'])->name('filmes.show');

require __DIR__.'/auth.php';
