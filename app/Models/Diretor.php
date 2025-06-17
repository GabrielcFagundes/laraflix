<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diretor extends Model
{
    use HasFactory;

    // Corrige o nome da tabela
    protected $table = 'diretores';

    protected $fillable = ['nome'];
}
