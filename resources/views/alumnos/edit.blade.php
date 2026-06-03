@extends('layout')

@section('title', 'Editar Alumno')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h1>✏️ Editar Alumno</h1>
        <p>Actualice la información del estudiante seleccionado.</p>
    </div>

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-grid">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" value="{{ $alumno->nombre }}" required>
            </div>

            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" name="apellidos" value="{{ $alumno->apellidos }}" required>
            </div>

            <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}" required>
            </div>

            <div class="form-group">
                <label>DNI</label>
                <input type="text" name="dni" value="{{ $alumno->dni }}" required>
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" value="{{ $alumno->direccion }}" required>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ $alumno->telefono }}" required>
            </div>

            <div class="form-group">
                <label>Correo Electrónico</label>
                <input type="email" name="email" value="{{ $alumno->email }}" required>
            </div>

            <div class="form-group">
                <label>Estado de Matrícula</label>
                <select name="estado_matricula">
                    <option value="matriculado" {{ $alumno->estado_matricula == 'matriculado' ? 'selected' : '' }}>
                        Matriculado
                    </option>
                    <option value="inactivo" {{ $alumno->estado_matricula == 'inactivo' ? 'selected' : '' }}>
                        Inactivo
                    </option>
                </select>
            </div>

        </div>

        <div class="form-actions">
            <a href="{{ route('alumnos.index') }}" class="btn btn-volver">
                ← Volver
            </a>

            <button type="submit" class="btn btn-guardar">
                💾 Actualizar Alumno
            </button>
        </div>

    </form>

</div>

@endsection