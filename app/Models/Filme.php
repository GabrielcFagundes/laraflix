<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'diretor', // agora é texto simples
        'nota',
        'imagem',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comentarios()
{
    return $this->hasMany(Comentario::class)->whereNull('comentario_pai_id');
}

    public function getImagemUrlAttribute()
    {
        return asset('storage/' . $this->imagem);
    }

    public function setNotaAttribute($value)
    {
        $this->attributes['nota'] = round($value, 1);
    }
}
