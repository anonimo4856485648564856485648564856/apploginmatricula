@extends('layout')

@section('title', 'Registrar Profesor')

@section('content')

<div class="form-card">

    <div class="form-header">
        <h1>👨‍🏫 Registrar Profesor</h1>
        <p>
            Complete la información del docente para registrarlo en el sistema académico.
        </p>
    </div>

    <form action="{{ route('profesores.store') }}" method="POST">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" required>
            </div>

            <div class="form-group">
                <label>Apellidos</label>
                <input type="text" name="apellidos" required>
            </div>

            <div class="form-group">
                <label>Especialidad</label>
                <input type="text" name="especialidad" required>
            </div>

        </div>

        <div class="form-actions">

            <a href="{{ route('profesores.index') }}"
               class="btn btn-volver">
                ← Volver
            </a>

            <button type="submit"
                    class="btn btn-guardar">
                💾 Guardar Profesor
            </button>

        </div>

    </form>

</div>

@endsection