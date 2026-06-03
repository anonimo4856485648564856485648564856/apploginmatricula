@extends('layout')

@section('title', 'Gestión de Horarios')

@section('content')

<div class="card">

```
<div class="page-header">
    <div>
        <h1>🕒 Gestión de Horarios</h1>
        <p style="color:#666;margin-top:8px;">
            Administración de horarios académicos registrados.
        </p>
    </div>

    <div style="display:flex;gap:10px;">

        <a href="{{ route('horarios.pdf') }}" class="btn pdf">
            📄 Exportar PDF
        </a>

        <a href="{{ route('horarios.create') }}" class="btn nuevo">
            ➕ Nuevo Horario
        </a>

    </div>
</div>

<div class="search-box">
    <input
        type="text"
        id="buscadorHorario"
        placeholder="🔍 Buscar por curso, día, hora o aula...">
</div>

<table class="tabla-premium">

    <thead>
        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Día</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Aula</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody id="tablaHorarios">

        @forelse($horarios as $horario)

        <tr>
            <td>{{ $horario->id }}</td>

            <td>
                <strong>
                    {{ $horario->curso->nombre_curso ?? 'Sin curso' }}
                </strong>
            </td>

            <td>{{ $horario->dia_semana }}</td>
            <td>{{ $horario->hora_inicio }}</td>
            <td>{{ $horario->hora_fin }}</td>

            <td>
                <span class="badge-aula">
                    {{ $horario->id_aula }}
                </span>
            </td>

            <td class="acciones">

                <a href="{{ route('horarios.edit', $horario->id) }}"
                   class="btn editar">
                    ✏️ Editar
                </a>

                <form action="{{ route('horarios.destroy', $horario->id) }}"
                      method="POST"
                      style="display:inline-block;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn eliminar"
                            onclick="return confirm('¿Desea eliminar este horario?')">
                        🗑 Eliminar
                    </button>

                </form>

            </td>
        </tr>

        @empty

        <tr>
            <td colspan="7" style="padding:30px;">
                No existen horarios registrados.
            </td>
        </tr>

        @endforelse

    </tbody>

</table>
```

</div>

<style>

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.page-header h1{
    margin:0;
    color:#7b1127;
    font-size:42px;
    font-weight:800;
}

.search-box{
    margin-bottom:22px;
}

.search-box input{
    width:100%;
    padding:15px 18px;
    border:1px solid #ddd;
    border-radius:14px;
    font-size:15px;
    outline:none;
    box-shadow:0 6px 15px rgba(0,0,0,.06);
}

.btn{
    border:none;
    border-radius:10px;
    padding:10px 18px;
    text-decoration:none;
    color:white;
    font-weight:bold;
}

.pdf{
    background:#198754;
}

.pdf:hover{
    background:#157347;
}

.nuevo{
    background:#0d6efd;
}

.editar{
    background:#7b1127;
}

.eliminar{
    background:#dc3545;
    cursor:pointer;
}

.tabla-premium{
    width:100%;
    border-collapse:separate;
    border-spacing:0 12px;
}

.tabla-premium thead th{
    background:#7b1127;
    color:white;
    padding:16px;
    text-align:center;
}

.tabla-premium tbody tr{
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
}

.tabla-premium tbody td{
    padding:18px;
    text-align:center;
}

.acciones{
    display:flex;
    justify-content:center;
    gap:10px;
}

.badge-aula{
    background:#eef5ff;
    color:#0d6efd;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

</style>

<script>

document.getElementById('buscadorHorario')
.addEventListener('keyup', function(){

    let texto = this.value.toLowerCase();

    let filas = document.querySelectorAll('#tablaHorarios tr');

    filas.forEach(function(fila){

        let contenido = fila.textContent.toLowerCase();

        fila.style.display =
            contenido.includes(texto)
            ? ''
            : 'none';

    });

});

</script>

@endsection
