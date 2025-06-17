<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'filme_id',
        'user_id',
        'comentario_pai_id',
        'conteudo',
        'autor', // necessário para permitir comentários anônimos
    ];

    public function filme()
    {
        return $this->belongsTo(Filme::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function respostas()
    {
        return $this->hasMany(Comentario::class, 'comentario_pai_id');
    }

    public function pai()
    {
        return $this->belongsTo(Comentario::class, 'comentario_pai_id');
    }
}
