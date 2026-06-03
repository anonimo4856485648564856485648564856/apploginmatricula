<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'curso_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'id_aula'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}