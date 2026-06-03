<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Matrículas</title>

    <style>
        body{font-family:Arial, sans-serif;font-size:11px;color:#222;}
        .header{text-align:center;margin-bottom:25px;}
        .header h1{color:#7b1127;margin-bottom:5px;}
        .header p{color:#666;}
        .fecha{text-align:right;margin-bottom:15px;}
        table{width:100%;border-collapse:collapse;}
        th{background:#7b1127;color:white;padding:8px;border:1px solid #ddd;}
        td{padding:7px;border:1px solid #ddd;text-align:center;}
        .footer{margin-top:20px;text-align:center;color:#666;font-size:10px;}
    </style>
</head>
<body>

<div class="header">
    <h1>REPORTE GENERAL DE MATRÍCULAS</h1>
    <p>Sistema de Matrícula - Laravel</p>
</div>

<div class="fecha">
    Fecha: {{ date('d/m/Y') }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Alumno</th>
            <th>Curso</th>
            <th>Profesor</th>
            <th>Horario</th>
            <th>Semestre</th>
            <th>Estado</th>
        </tr>
    </thead>

    <tbody>
        @foreach($matriculas as $matricula)
        <tr>
            <td>{{ $matricula->id }}</td>
            <td>{{ $matricula->alumno->nombre ?? 'Sin alumno' }}</td>
            <td>{{ $matricula->curso->nombre_curso ?? 'Sin curso' }}</td>
            <td>{{ $matricula->profesor->nombre ?? 'Sin profesor' }}</td>
            <td>{{ $matricula->horario->dia_semana ?? 'Sin horario' }}</td>
            <td>{{ $matricula->semestre }}</td>
            <td>{{ $matricula->estado }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="footer">
    Documento generado automáticamente por el Sistema de Matrícula.
</div>

</body>
</html>