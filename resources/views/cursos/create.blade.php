@extends('layout')

@section('title', 'Registrar Curso')

@section('content')

<div class="form-card">

```
<div class="form-header">
    <h1>📚 Registrar Curso</h1>
    <p>
        Complete la información del curso para registrarlo en el sistema académico.
    </p>
</div>

<form action="{{ route('cursos.store') }}" method="POST">
    @csrf

    <div class="form-grid">

        <div class="form-group">
            <label>Nombre del Curso</label>
            <input type="text" name="nombre_curso" required>
        </div>

        <div class="form-group">
            <label>Código del Curso</label>
            <input type="text" name="codigo_curso" required>
        </div>

        <div class="form-group">
            <label>Créditos</label>
            <input type="number" name="creditos" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" rows="4" required></textarea>
        </div>

    </div>

    <div class="form-actions">

        <a href="{{ route('cursos.index') }}"
           class="btn btn-volver">
            ← Volver
        </a>

        <button type="submit"
                class="btn btn-guardar">
            💾 Guardar Curso
        </button>

    </div>

</form>
```

</div>

@endsection
