<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    protected $table = 'noticias'; // Nombre de la tabla en la BD

    protected $fillable = [
        'titulo',
        'link',
        'fecha',
        'clasificacion',
    ];

    public $timestamps = false; // Si no necesitas los campos created_at y updated_at
}
