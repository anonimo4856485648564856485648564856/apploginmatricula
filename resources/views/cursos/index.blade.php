@extends('layout')

@section('title', 'Gestión de Cursos')

@section('content')

<div class="card">

```
<div class="page-header">
    <div>
        <h1>📚 Gestión de Cursos</h1>
        <p style="color:#666;margin-top:8px;">
            Administración de cursos registrados en el sistema académico.
        </p>
    </div>

    <div style="display:flex;gap:10px;">

        <a href="{{ route('cursos.pdf') }}" class="btn pdf">
            📄 Exportar PDF
        </a>

        <a href="{{ route('cursos.create') }}" class="btn nuevo">
            ➕ Nuevo Curso
        </a>

    </div>
</div>

<div class="search-box">
    <input
        type="text"
        id="buscadorCurso"
        placeholder="🔍 Buscar curso por nombre, código o descripción...">
</div>

<table class="tabla-premium">

    <thead>
        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Código</th>
            <th>Créditos</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody id="tablaCursos">

        @forelse($cursos as $curso)

        <tr>
            <td>{{ $curso->id }}</td>

            <td>
                <strong>{{ $curso->nombre_curso }}</strong>
            </td>

            <td>{{ $curso->codigo_curso }}</td>

            <td>
                <span class="badge-credito">
                    {{ $curso->creditos }}
                </span>
            </td>

            <td>{{ $curso->descripcion }}</td>

            <td class="acciones">

                <a href="{{ route('cursos.edit', $curso->id) }}"
                   class="btn editar">
                    ✏️ Editar
                </a>

                <form action="{{ route('cursos.destroy', $curso->id) }}"
                      method="POST"
                      style="display:inline-block;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn eliminar"
                            onclick="return confirm('¿Desea eliminar este curso?')">
                        🗑 Eliminar
                    </button>

                </form>

            </td>
        </tr>

        @empty

        <tr>
            <td colspan="6" style="padding:30px;">
                No existen cursos registrados.
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

.badge-credito{
    background:#eef5ff;
    color:#0d6efd;
    padding:8px 14px;
    border-radius:20px;
    font-weight:bold;
}

</style>

<script>

document.getElementById('buscadorCurso')
.addEventListener('keyup', function() {

    let texto = this.value.toLowerCase();

    let filas = document.querySelectorAll('#tablaCursos tr');

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
