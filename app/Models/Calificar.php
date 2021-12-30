<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificar extends Model
{
    use HasFactory;
    protected $table='calificar';
    protected $fillable=
    ['id_usuario',
     'puntaje',   ];
}
