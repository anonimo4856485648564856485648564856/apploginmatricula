@extends('layout')

@section('title', 'Dashboard')

@section('content')

<div class="hero">
    <div>
        <h1>Bienvenido, {{ Auth::user()->name }}</h1>
        <h2>Sistema de Matrícula</h2>
        <p>
            Panel principal para administrar alumnos, cursos, profesores,
            horarios y matrículas de manera eficiente.
        </p>
    </div>
</div>

<div class="stats">

    <a href="{{ route('alumnos.index') }}" class="stat red">
        <div class="icon">👨‍🎓</div>
        <h2>Alumnos</h2>
        <strong>{{ $totalAlumnos }}</strong>
        <p>Estudiantes registrados</p>
    </a>

    <a href="{{ route('cursos.index') }}" class="stat gold">
        <div class="icon">📚</div>
        <h2>Cursos</h2>
        <strong>{{ $totalCursos }}</strong>
        <p>Cursos disponibles</p>
    </a>

    <a href="{{ route('profesores.index') }}" class="stat green">
        <div class="icon">👨‍🏫</div>
        <h2>Profesores</h2>
        <strong>{{ $totalProfesores }}</strong>
        <p>Docentes registrados</p>
    </a>

    <a href="{{ route('horarios.index') }}" class="stat blue">
        <div class="icon">🕒</div>
        <h2>Horarios</h2>
        <strong>{{ $totalHorarios }}</strong>
        <p>Horarios programados</p>
    </a>

    <a href="{{ route('matriculas.index') }}" class="stat purple">
        <div class="icon">📝</div>
        <h2>Matrículas</h2>
        <strong>{{ $totalMatriculas }}</strong>
        <p>Matrículas realizadas</p>
    </a>

</div>

<div class="bottom-grid">
    <div class="card">
        <h2>Actividad Reciente</h2>
        <p>✅ Has iniciado sesión correctamente.</p>
        <p>✅ Sistema funcionando con Laravel y MySQL.</p>
        <p>✅ API REST disponible para alumnos.</p>
    </div>

    <div class="card">
        <h2>Accesos Rápidos</h2>

        <div class="quick">
            <a href="{{ route('alumnos.create') }}">Nuevo Alumno</a>
            <a href="{{ route('cursos.create') }}">Nuevo Curso</a>
            <a href="{{ route('profesores.create') }}">Nuevo Profesor</a>
            <a href="{{ route('horarios.create') }}">Nuevo Horario</a>
            <a href="{{ route('matriculas.create') }}">Nueva Matrícula</a>
        </div>
    </div>
</div>

<div class="chart-grid">
    <div class="card">
        <h2>📊 Estadísticas Generales</h2>
        <canvas id="graficoBarras"></canvas>
    </div>

    <div class="card">
        <h2>📈 Distribución del Sistema</h2>
        <canvas id="graficoCircular"></canvas>
    </div>
</div>

<style>
.hero{
    min-height:260px;
    border-radius:18px;
    padding:45px;
    background:
        linear-gradient(90deg,rgba(255,255,255,.98),rgba(255,255,255,.72)),
        linear-gradient(135deg,#7b1127,#d8b45c);
    box-shadow:0 10px 28px rgba(0,0,0,.12);
    display:flex;
    align-items:center;
    margin-bottom:28px;
}

.hero h1{
    font-size:42px;
    margin:0;
    color:#111;
}

.hero h2{
    font-size:30px;
    margin:8px 0;
    color:#7b1127;
}

.hero p{
    max-width:650px;
    line-height:1.7;
    color:#555;
}

.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(210px,1fr));
    gap:22px;
    margin-bottom:28px;
}

.stat{
    text-decoration:none;
    color:#222;
    background:white;
    padding:28px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.12);
    transition:.3s;
    border-top:5px solid #7b1127;
}

.stat:hover{
    transform:translateY(-6px);
}

.icon{
    width:70px;
    height:70px;
    margin:auto;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    background:#f3e8eb;
}

.stat h2{
    margin-bottom:8px;
}

.stat strong{
    font-size:45px;
    color:#7b1127;
}

.red{border-color:#7b1127}
.gold{border-color:#d8b45c}
.green{border-color:#4f7d4f}
.blue{border-color:#315d80}
.purple{border-color:#7a4b94}

.bottom-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:24px;
    margin-bottom:28px;
}

.chart-grid{
    display:grid;
    grid-template-columns:1.4fr .8fr;
    gap:24px;
    margin-top:28px;
}

.quick{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
}

.quick a{
    text-decoration:none;
    padding:12px 16px;
    background:#f3e8eb;
    color:#7b1127;
    border-radius:10px;
    font-weight:bold;
}

canvas{
    margin-top:20px;
    max-height:320px;
}

@media(max-width:900px){
    .bottom-grid,
    .chart-grid{
        grid-template-columns:1fr;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = ['Alumnos', 'Cursos', 'Profesores', 'Horarios', 'Matrículas'];

const datos = [
    {{ $totalAlumnos }},
    {{ $totalCursos }},
    {{ $totalProfesores }},
    {{ $totalHorarios }},
    {{ $totalMatriculas }}
];

new Chart(document.getElementById('graficoBarras'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Cantidad de registros',
            data: datos,
            backgroundColor: [
                '#7b1127',
                '#d8b45c',
                '#4f7d4f',
                '#315d80',
                '#7a4b94'
            ],
            borderRadius: 10
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});

new Chart(document.getElementById('graficoCircular'), {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [{
            data: datos,
            backgroundColor: [
                '#7b1127',
                '#d8b45c',
                '#4f7d4f',
                '#315d80',
                '#7a4b94'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

@endsection