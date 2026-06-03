@extends('layout')

@section('title', 'Editar Profesor')

@section('content')

<div class="form-card">

```
<div class="form-header">
    <h1>👨‍🏫 Editar Profesor</h1>
    <p>
        Actualice la información del profesor seleccionado.
    </p>
</div>

<form action="{{ route('profesores.update', $profesor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-grid">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text"
                   name="nombre"
                   value="{{ $profesor->nombre }}"
                   required>
        </div>

        <div class="form-group">
            <label>Apellidos</label>
            <input type="text"
                   name="apellidos"
                   value="{{ $profesor->apellidos }}"
                   required>
        </div>

        <div class="form-group">
            <label>Especialidad</label>
            <input type="text"
                   name="especialidad"
                   value="{{ $profesor->especialidad }}"
                   required>
        </div>

    </div>

    <div class="form-actions">

        <a href="{{ route('profesores.index') }}"
           class="btn btn-volver">
            ← Volver
        </a>

        <button type="submit"
                class="btn btn-guardar">
            💾 Actualizar Profesor
        </button>

    </div>

</form>
```

</div>

@endsection
