<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsistenciaPersonas extends Model
{
    use HasFactory;

    protected $table = 'asistencia_personas';

    protected $fillable = [
        'id_persona',
        'asistencia',
    ];

    protected $PK = ['id'];

    public function getPersona()
    {
        return $this->belongsTo(Personas::class, 'id_persona');
    }
}
