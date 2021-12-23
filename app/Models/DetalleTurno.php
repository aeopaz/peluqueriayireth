<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleTurno extends Model
{
    use HasFactory;
    protected $table='detalle_turnos';
    protected $fillable=['id_turno','id_servicio'];
}
