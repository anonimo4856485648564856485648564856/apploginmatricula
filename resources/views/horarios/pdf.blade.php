<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Horarios</title>

    <style>
        body{font-family:Arial, sans-serif;font-size:12px;color:#222;}
        .header{text-align:center;margin-bottom:25px;}
        .header h1{color:#7b1127;margin-bottom:5px;}
        .header p{color:#666;}
        .fecha{text-align:right;margin-bottom:15px;}
        table{width:100%;border-collapse:collapse;}
        th{background:#7b1127;color:white;padding:10px;border:1px solid #ddd;}
        td{padding:8px;border:1px solid #ddd;text-align:center;}
        .footer{margin-top:20px;text-align:center;color:#666;font-size:11px;}
    </style>
</head>
<body>

<div class="header">
    <h1>REPORTE GENERAL DE HORARIOS</h1>
    <p>Sistema de Matrícula - Laravel</p>
</div>

<div class="fecha">
    Fecha: {{ date('d/m/Y') }}
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Curso</th>
            <th>Día</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
            <th>Aula</th>
        </tr>
    </thead>

    <tbody>
        @foreach($horarios as $horario)
        <tr>
            <td>{{ $horario->id }}</td>
            <td>{{ $horario->curso->nombre_curso ?? 'Sin curso' }}</td>
            <td>{{ $horario->dia_semana }}</td>
            <td>{{ $horario->hora_inicio }}</td>
            <td>{{ $horario->hora_fin }}</td>
            <td>{{ $horario->id_aula }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="footer">
    Documento generado automáticamente por el Sistema de Matrícula.
</div>

</body>
</html>