@extends('layout')

@section('title', 'Gestión de Matrículas')

@section('content')

<div class="card">

```
<div class="page-header">
    <div>
        <h1>📝 Gestión de Matrículas</h1>
        <p style="color:#666;margin-top:8px;">
            Administración de matrículas académicas entre alumnos, cursos, profesores y horarios.
        </p>
    </div>

    <div style="display:flex;gap:10px;">

        <a href="{{ route('matriculas.pdf') }}" class="btn pdf">
            📄 Exportar PDF
        </a>

        <a href="{{ route('matriculas.create') }}" class="btn nuevo">
            ➕ Nueva Matrícula
        </a>

    </div>
</div>

<div class="search-box">
    <input
        type="text"
        id="buscadorMatricula"
        placeholder="🔍 Buscar alumno, curso, profesor, semestre o estado...">
</div>

<table class="tabla-premium">

    <thead>
        <tr>
            <th>ID</th>
            <th>Alumno</th>
            <th>Curso</th>
            <th>Profesor</th>
            <th>Horario</th>
            <th>Semestre</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody id="tablaMatriculas">

        @forelse($matriculas as $matricula)

        <tr>
            <td>{{ $matricula->id }}</td>

            <td>
                <strong>
                    {{ $matricula->alumno->nombre ?? 'Sin alumno' }}
                </strong>
            </td>

            <td>{{ $matricula->curso->nombre_curso ?? 'Sin curso' }}</td>

            <td>{{ $matricula->profesor->nombre ?? 'Sin profesor' }}</td>

            <td>
                <span class="badge-horario">
                    {{ $matricula->horario->dia_semana ?? 'Sin horario' }}
                </span>
            </td>

            <td>
                <span class="badge-semestre">
                    {{ $matricula->semestre }}
                </span>
            </td>

            <td>
                @if($matricula->estado == 'aprobado')
                    <span class="badge-aprobado">Aprobado</span>
                @elseif($matricula->estado == 'reprobado')
                    <span class="badge-reprobado">Reprobado</span>
                @else
                    <span class="badge-cursando">Cursando</span>
                @endif
            </td>

            <td class="acciones">

                <a href="{{ route('matriculas.edit', $matricula->id) }}"
                   class="btn editar">
                    ✏️ Editar
                </a>

                <form action="{{ route('matriculas.destroy', $matricula->id) }}"
                      method="POST"
                      style="display:inline-block;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn eliminar"
                            onclick="return confirm('¿Desea eliminar esta matrícula?')">
                        🗑 Eliminar
                    </button>

                </form>

            </td>
        </tr>

        @empty

        <tr>
            <td colspan="8" style="padding:30px;">
                No existen matrículas registradas.
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
    transition:.3s;
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

.nuevo:hover{
    transform:translateY(-2px);
}

.editar{
    background:#7b1127;
}

.editar:hover{
    background:#5c0d1d;
}

.eliminar{
    background:#dc3545;
    cursor:pointer;
}

.eliminar:hover{
    background:#b02a37;
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
    font-size:15px;
}

.tabla-premium tbody tr{
    background:white;
    box-shadow:0 5px 15px rgba(0,0,0,.08);
    transition:.3s;
}

.tabla-premium tbody tr:hover{
    transform:scale(1.01);
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

.badge-horario{
    background:#eef2ff;
    color:#315d80;
    padding:8px 12px;
    border-radius:20px;
    font-weight:bold;
}

.badge-semestre{
    background:#f3e8eb;
    color:#7b1127;
    padding:8px 12px;
    border-radius:20px;
    font-weight:bold;
}

.badge-aprobado{
    background:#e8f5e9;
    color:#2e7d32;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

.badge-reprobado{
    background:#fdecea;
    color:#c62828;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

.badge-cursando{
    background:#fff8e1;
    color:#b26a00;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

</style>

<script>

document.getElementById('buscadorMatricula')
.addEventListener('keyup', function(){

    let texto = this.value.toLowerCase();

    let filas = document.querySelectorAll('#tablaMatriculas tr');

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
