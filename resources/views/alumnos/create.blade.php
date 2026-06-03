@extends('layout')

@section('title', 'Registrar Alumno')

@section('content')

<div class="form-card">

```
<div class="form-header">
    <h1>👨‍🎓 Registrar Alumno</h1>
    <p>
        Complete la información del estudiante para registrarlo en el sistema académico.
    </p>
</div>

<form action="{{ route('alumnos.store') }}" method="POST">
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
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fecha_nacimiento" required>
        </div>

        <div class="form-group">
            <label>DNI</label>
            <input type="text" name="dni" required>
        </div>

        <div class="form-group">
            <label>Dirección</label>
            <input type="text" name="direccion" required>
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="telefono" required>
        </div>

        <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>Estado de Matrícula</label>

            <select name="estado_matricula">
                <option value="matriculado">Matriculado</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>

    </div>

    <div class="form-actions">

        <a href="{{ route('alumnos.index') }}"
           class="btn btn-volver">
            ← Volver
        </a>

        <button type="submit"
                class="btn btn-guardar">
            💾 Guardar Alumno
        </button>

    </div>

</form>
```

</div>

@endsection
