@extends('layout')

@section('title', 'Editar Horario')

@section('content')

<div class="form-card">

```
<div class="form-header">
    <h1>🕒 Editar Horario</h1>
    <p>
        Actualice la información del horario seleccionado.
    </p>
</div>

<form action="{{ route('horarios.update', $horario->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-grid">

        <div class="form-group">
            <label>Curso</label>
            <select name="id_curso" required>

                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}"
                        {{ $horario->id_curso == $curso->id ? 'selected' : '' }}>
                        {{ $curso->nombre_curso }}
                    </option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label>Día de la Semana</label>
            <input type="text"
                   name="dia_semana"
                   value="{{ $horario->dia_semana }}"
                   required>
        </div>

        <div class="form-group">
            <label>Hora de Inicio</label>
            <input type="time"
                   name="hora_inicio"
                   value="{{ $horario->hora_inicio }}"
                   required>
        </div>

        <div class="form-group">
            <label>Hora de Fin</label>
            <input type="time"
                   name="hora_fin"
                   value="{{ $horario->hora_fin }}"
                   required>
        </div>

        <div class="form-group">
            <label>Aula</label>
            <input type="text"
                   name="id_aula"
                   value="{{ $horario->id_aula }}"
                   required>
        </div>

    </div>

    <div class="form-actions">

        <a href="{{ route('horarios.index') }}"
           class="btn btn-volver">
            ← Volver
        </a>

        <button type="submit"
                class="btn btn-guardar">
            💾 Actualizar Horario
        </button>

    </div>

</form>
```

</div>

@endsection
