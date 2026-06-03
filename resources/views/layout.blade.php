<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Matrícula')</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI',sans-serif;
        }

        body{
            background:#f4f6f9;
            color:#222;
        }

        /* HEADER */

        .topbar{
            height:80px;
            background:linear-gradient(135deg,#7b1127,#4b0b18);
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 35px;
            color:white;
            box-shadow:0 8px 25px rgba(0,0,0,.25);
        }

        .brand{
            font-size:24px;
            font-weight:800;
            letter-spacing:.5px;
        }

        .brand small{
            display:block;
            font-size:12px;
            opacity:.8;
            margin-top:2px;
        }

        .user{
            font-size:16px;
            font-weight:700;
        }

        /* LAYOUT */

        .layout{
            display:flex;
            min-height:calc(100vh - 80px);
        }

        /* SIDEBAR */

        .sidebar{
            width:260px;
            background:linear-gradient(180deg,#5c0d1d,#2d0811);
            padding:30px 20px;
        }

        .sidebar a{
            display:block;
            text-decoration:none;
            color:white;
            padding:15px 18px;
            margin-bottom:12px;
            border-radius:12px;
            font-weight:600;
            transition:.3s;
        }

        .sidebar a:hover{
            background:#8b1530;
            transform:translateX(5px);
        }

        /* CONTENT */

        .content{
            flex:1;
            padding:30px;
        }

        /* NAV */

        .nav-top{
            background:white;
            padding:18px;
            border-radius:18px;
            display:flex;
            gap:12px;
            align-items:center;
            box-shadow:0 10px 25px rgba(0,0,0,.08);
            margin-bottom:30px;
        }

        .nav-top a{
            text-decoration:none;
            background:#f4f4f4;
            color:#7b1127;
            padding:12px 18px;
            border-radius:12px;
            font-weight:700;
            transition:.3s;
        }

        .nav-top a:hover{
            background:#7b1127;
            color:white;
        }

        .logout-btn{
            margin-left:auto;
            background:#7b1127;
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:12px;
            cursor:pointer;
            font-weight:bold;
        }

        .logout-btn:hover{
            background:#5d0b1d;
        }

        /* CARD */

        .card{
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 12px 32px rgba(0,0,0,.10);
        }

        h1,h2{
            color:#7b1127;
        }

        /* TABLAS */

        .page-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        .page-header h1{
            font-size:38px;
            font-weight:800;
        }

        table{
            width:100%;
            border-collapse:separate;
            border-spacing:0 12px;
        }

        thead th{
            background:#7b1127;
            color:white;
            padding:16px;
            font-size:15px;
        }

        thead th:first-child{
            border-radius:12px 0 0 12px;
        }

        thead th:last-child{
            border-radius:0 12px 12px 0;
        }

        tbody tr{
            background:white;
            box-shadow:0 6px 15px rgba(0,0,0,.08);
            transition:.3s;
        }

        tbody tr:hover{
            transform:translateY(-2px);
        }

        tbody td{
            padding:18px;
            text-align:center;
        }

        tbody td:first-child{
            border-radius:12px 0 0 12px;
        }

        tbody td:last-child{
            border-radius:0 12px 12px 0;
        }

        /* BOTONES */

        .btn{
            padding:10px 18px;
            border:none;
            border-radius:10px;
            color:white;
            text-decoration:none;
            font-weight:bold;
            cursor:pointer;
        }

        .nuevo{
            background:#0d6efd;
        }

        .editar{
            background:#7b1127;
        }

        .eliminar{
            background:#dc3545;
        }

        /* FORMULARIOS PREMIUM */

        .form-card{
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 12px 32px rgba(0,0,0,.10);
            max-width:900px;
            margin:auto;
        }

        .form-header{
            margin-bottom:30px;
        }

        .form-header h1{
            font-size:38px;
            color:#7b1127;
            margin-bottom:8px;
        }

        .form-header p{
            color:#666;
        }

        .form-grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:22px;
        }

        .form-group{
            display:flex;
            flex-direction:column;
        }

        .form-group label{
            font-weight:700;
            margin-bottom:8px;
            color:#444;
        }

        .form-group input,
        .form-group select,
        .form-group textarea{
            padding:14px;
            border:1px solid #ddd;
            border-radius:12px;
            font-size:15px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus{
            outline:none;
            border-color:#7b1127;
            box-shadow:0 0 0 4px rgba(123,17,39,.12);
        }

        .form-actions{
            margin-top:30px;
            display:flex;
            justify-content:flex-end;
            gap:15px;
        }

        .btn-volver{
            background:#6c757d;
        }

        .btn-guardar{
            background:#7b1127;
        }

        @media(max-width:900px){

            .layout{
                flex-direction:column;
            }

            .sidebar{
                width:100%;
            }

            .form-grid{
                grid-template-columns:1fr;
            }
        }

    </style>
</head>

<body>

<header class="topbar">
    <div class="brand">
        🎓 SISTEMA DE MATRÍCULA
        <small>PLATAFORMA ACADÉMICA</small>
    </div>

    <div class="user">
        {{ Auth::user()->name ?? 'Administrador' }}
    </div>
</header>

<div class="layout">

    <aside class="sidebar">
        <a href="{{ route('dashboard') }}">🏠 Dashboard</a>
        <a href="{{ route('alumnos.index') }}">👨‍🎓 Alumnos</a>
        <a href="{{ route('cursos.index') }}">📚 Cursos</a>
        <a href="{{ route('profesores.index') }}">👨‍🏫 Profesores</a>
        <a href="{{ route('horarios.index') }}">🕒 Horarios</a>
        <a href="{{ route('matriculas.index') }}">📝 Matrículas</a>
    </aside>

    <main class="content">

        <div class="nav-top">

    <form method="POST"
          action="{{ route('logout') }}"
          style="margin-left:auto;">
        @csrf

        <button class="logout-btn">
            Cerrar Sesión
        </button>
    </form>

</div>

        @yield('content')

    </main>

</div>

</body>
</html>