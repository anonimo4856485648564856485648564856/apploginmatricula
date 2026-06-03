@extends('layout')

@section('title', 'Gestión de Alumnos')

@section('content')

<div class="card">

    <div class="page-header">
        <div>
            <h1>👨‍🎓 Gestión de Alumnos</h1>
            <p style="color:#666;margin-top:8px;">
                Administración de estudiantes registrados y estado de matrícula.
            </p>
        </div>

        <div style="display:flex;gap:10px;">

            <a href="{{ route('alumnos.pdf') }}" class="btn pdf">
                📄 Exportar PDF
            </a>

            <a href="{{ route('alumnos.create') }}" class="btn nuevo">
                ➕ Nuevo Alumno
            </a>

        </div>
    </div>

    <div class="search-box">
        <input
            type="text"
            id="buscadorAlumno"
            placeholder="🔍 Buscar por nombre, apellido, DNI, correo o estado...">
    </div>

    <table class="tabla-premium">

        <thead>
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody id="tablaAlumnos">

            @forelse($alumnos as $alumno)

            <tr>
                <td>{{ $alumno->id }}</td>

                <td>
                    <strong>{{ $alumno->nombre }}</strong>
                </td>

                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->dni }}</td>
                <td>{{ $alumno->email }}</td>

                <td>
                    @if($alumno->estado_matricula == 'matriculado')
                        <span class="badge-activo">
                            Matriculado
                        </span>
                    @else
                        <span class="badge-inactivo">
                            Inactivo
                        </span>
                    @endif
                </td>

                <td class="acciones">

                    <a href="{{ route('alumnos.edit', $alumno->id) }}"
                       class="btn editar">
                        ✏️ Editar
                    </a>

                    <form action="{{ route('alumnos.destroy', $alumno->id) }}"
                          method="POST"
                          style="display:inline-block;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn eliminar"
                                onclick="return confirm('¿Desea eliminar este alumno?')">
                            🗑 Eliminar
                        </button>

                    </form>

                </td>
            </tr>

            @empty

            <tr>
                <td colspan="7" style="padding:30px;">
                    No existen alumnos registrados.
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

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

.tabla-premium thead th:first-child{
    border-radius:12px 0 0 12px;
}

.tabla-premium thead th:last-child{
    border-radius:0 12px 12px 0;
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

.badge-activo{
    background:#e8f5e9;
    color:#2e7d32;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

.badge-inactivo{
    background:#fdecea;
    color:#c62828;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

</style>

<script>

document.getElementById('buscadorAlumno')
.addEventListener('keyup', function(){

    let texto = this.value.toLowerCase();

    let filas = document.querySelectorAll('#tablaAlumnos tr');

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