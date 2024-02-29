<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'titulo',
        'texto_completo',
        'descricao',
        'imagem',
        'created_at',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
