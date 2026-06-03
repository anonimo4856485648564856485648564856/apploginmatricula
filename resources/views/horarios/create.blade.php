@extends('layout')

@section('title', 'Registrar Horario')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h1>🕒 Registrar Horario</h1>
        <p>
            Complete la información del horario para registrarlo en el sistema académico.
        </p>
    </div>

    <form action="{{ route('horarios.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Curso</label>
                <select name="curso_id" required>
                    <option value="">Seleccione un curso</option>

                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Día de la Semana</label>
                <input type="text" name="dia_semana" required>
            </div>

            <div class="form-group">
                <label>Hora de Inicio</label>
                <input type="time" name="hora_inicio" required>
            </div>

            <div class="form-group">
                <label>Hora de Fin</label>
                <input type="time" name="hora_fin" required>
            </div>

            <div class="form-group">
                <label>Aula</label>
                <input type="text" name="id_aula" required>
            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('horarios.index') }}" class="btn btn-volver">
                ← Volver
            </a>

            <button type="submit" class="btn btn-guardar">
                💾 Guardar Horario
            </button>
        </div>

    </form>

</div>

@endsection