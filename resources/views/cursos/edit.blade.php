@extends('layout')

@section('title', 'Editar Curso')

@section('content')

<div class="form-card">

```
<div class="form-header">
    <h1>📚 Editar Curso</h1>
    <p>
        Actualice la información del curso seleccionado.
    </p>
</div>

<form action="{{ route('cursos.update', $curso->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-grid">

        <div class="form-group">
            <label>Nombre del Curso</label>
            <input type="text"
                   name="nombre_curso"
                   value="{{ $curso->nombre_curso }}"
                   required>
        </div>

        <div class="form-group">
            <label>Código del Curso</label>
            <input type="text"
                   name="codigo_curso"
                   value="{{ $curso->codigo_curso }}"
                   required>
        </div>

        <div class="form-group">
            <label>Créditos</label>
            <input type="number"
                   name="creditos"
                   value="{{ $curso->creditos }}"
                   required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion"
                      rows="4"
                      required>{{ $curso->descripcion }}</textarea>
        </div>

    </div>

    <div class="form-actions">

        <a href="{{ route('cursos.index') }}"
           class="btn btn-volver">
            ← Volver
        </a>

        <button type="submit"
                class="btn btn-guardar">
            💾 Actualizar Curso
        </button>

    </div>

</form>
```

</div>

@endsection
