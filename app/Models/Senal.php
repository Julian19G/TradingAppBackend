<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senal extends Model
{
    use HasFactory;

    protected $table = 'senals'; // Nombre de la tabla en la BD

    protected $fillable = [
        'timestamp',
        'signal',
        'close',
    ];

    public $timestamps = false;
}
