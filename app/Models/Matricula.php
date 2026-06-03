<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'alumno_id',
        'curso_id',
        'profesor_id',
        'horario_id',
        'semestre',
        'fecha_matricula',
        'nota_final',
        'estado'
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}