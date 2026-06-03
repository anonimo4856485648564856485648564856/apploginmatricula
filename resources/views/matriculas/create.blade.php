@extends('layout')

@section('title', 'Registrar Matrícula')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h1>📝 Registrar Matrícula</h1>
        <p>Complete los datos para registrar una nueva matrícula académica.</p>
    </div>

    <form action="{{ route('matriculas.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Alumno</label>
                <select name="alumno_id" required>
                    <option value="">Seleccione un alumno</option>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}">
                            {{ $alumno->nombre }} {{ $alumno->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

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
                <label>Profesor</label>
                <select name="profesor_id" required>
                    <option value="">Seleccione un profesor</option>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->id }}">
                            {{ $profesor->nombre }} {{ $profesor->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Horario</label>
                <select name="horario_id" required>
                    <option value="">Seleccione un horario</option>
                    @foreach($horarios as $horario)
                        <option value="{{ $horario->id }}">
                            {{ $horario->dia_semana }} - {{ $horario->hora_inicio }} a {{ $horario->hora_fin }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Semestre</label>
                <input type="text" name="semestre" placeholder="Ej: 2026-I" required>
            </div>

            <div class="form-group">
                <label>Fecha de Matrícula</label>
                <input type="date" name="fecha_matricula" required>
            </div>

            <div class="form-group">
                <label>Nota Final</label>
                <input type="number" step="0.01" name="nota_final" placeholder="Opcional">
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" required>
                    <option value="cursando">Cursando</option>
                    <option value="aprobado">Aprobado</option>
                    <option value="reprobado">Reprobado</option>
                </select>
            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('matriculas.index') }}" class="btn btn-volver">
                ← Volver
            </a>

            <button type="submit" class="btn btn-guardar">
                💾 Guardar Matrícula
            </button>
        </div>

    </form>

</div>

@endsection