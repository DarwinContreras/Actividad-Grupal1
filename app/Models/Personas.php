<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombres',
        'apellidos',
        'identificador',
        'nacimiento',
        'codigo',
        'tipo',
        'lunes_inicio',
        'lunes_fin',
        'martes_inicio',
        'martes_fin',
        'miercoles_inicio',
        'miercoles_fin',
        'jueves_inicio',
        'jueves_fin',
        'viernes_inicio',
        'viernes_fin',
        'sabado_inicio',
        'sabado_fin',
    ];

    protected $PK = ['id'];

    public function getAsistencias()
    {
        return $this->hasMany(AsistenciaPersonas::class, 'id_persona');
    }
}
