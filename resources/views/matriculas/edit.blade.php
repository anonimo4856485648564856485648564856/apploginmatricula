@extends('layout')

@section('title', 'Editar Matrícula')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h1>📝 Editar Matrícula</h1>
        <p>Actualice la información de la matrícula seleccionada.</p>
    </div>

    <form action="{{ route('matriculas.update', $matricula->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Alumno</label>
                <select name="alumno_id" required>
                    @foreach($alumnos as $alumno)
                        <option value="{{ $alumno->id }}"
                            {{ $matricula->alumno_id == $alumno->id ? 'selected' : '' }}>
                            {{ $alumno->nombre }} {{ $alumno->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Curso</label>
                <select name="curso_id" required>
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}"
                            {{ $matricula->curso_id == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nombre_curso }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Profesor</label>
                <select name="profesor_id" required>
                    @foreach($profesores as $profesor)
                        <option value="{{ $profesor->id }}"
                            {{ $matricula->profesor_id == $profesor->id ? 'selected' : '' }}>
                            {{ $profesor->nombre }} {{ $profesor->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Horario</label>
                <select name="horario_id" required>
                    @foreach($horarios as $horario)
                        <option value="{{ $horario->id }}"
                            {{ $matricula->horario_id == $horario->id ? 'selected' : '' }}>
                            {{ $horario->dia_semana }} - {{ $horario->hora_inicio }} a {{ $horario->hora_fin }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Semestre</label>
                <input type="text" name="semestre" value="{{ $matricula->semestre }}" required>
            </div>

            <div class="form-group">
                <label>Fecha de Matrícula</label>
                <input type="date" name="fecha_matricula" value="{{ $matricula->fecha_matricula }}" required>
            </div>

            <div class="form-group">
                <label>Nota Final</label>
                <input type="number" step="0.01" name="nota_final" value="{{ $matricula->nota_final }}">
            </div>

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" required>
                    <option value="cursando" {{ $matricula->estado == 'cursando' ? 'selected' : '' }}>Cursando</option>
                    <option value="aprobado" {{ $matricula->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                    <option value="reprobado" {{ $matricula->estado == 'reprobado' ? 'selected' : '' }}>Reprobado</option>
                </select>
            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('matriculas.index') }}" class="btn btn-volver">
                ← Volver
            </a>

            <button type="submit" class="btn btn-guardar">
                💾 Actualizar Matrícula
            </button>
        </div>

    </form>

</div>

@endsection