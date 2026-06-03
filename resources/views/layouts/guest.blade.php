<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Matrícula</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,#e8e1df,#f6f3ef);
        }

        .auth-page{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:30px;
        }

        .auth-container{
            width:100%;
            max-width:1100px;
            min-height:620px;
            display:grid;
            grid-template-columns:1.1fr .9fr;
            border-radius:26px;
            overflow:hidden;
            box-shadow:0 30px 80px rgba(0,0,0,.25);
            background:white;
        }

        .auth-left{
            background:linear-gradient(160deg,#8b102b,#5c0d1d,#2b0b14);
            color:white;
            padding:55px;
            position:relative;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
            font-weight:800;
            letter-spacing:2px;
            margin-bottom:70px;
        }

        .brand-icon{
            width:48px;
            height:48px;
            border:2px solid rgba(255,255,255,.6);
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
        }

        .auth-left h1{
            font-size:48px;
            line-height:1.08;
            font-weight:900;
            margin-bottom:28px;
        }

        .auth-left p{
            font-size:16px;
            line-height:1.7;
            color:#f3d7dd;
            max-width:480px;
        }

        .quote{
            margin-top:65px;
            padding-left:18px;
            border-left:4px solid #d8b45c;
            font-style:italic;
            color:#fff;
        }

        .footer{
            position:absolute;
            bottom:35px;
            font-size:13px;
            color:#ead4d8;
        }

        .auth-right{
            background:#f8f5f2;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:50px;
        }

        .auth-card{
            width:100%;
            max-width:420px;
            background:rgba(255,255,255,.85);
            border:1px solid rgba(0,0,0,.08);
            border-radius:22px;
            padding:35px;
            box-shadow:0 20px 45px rgba(0,0,0,.12);
        }

        @media(max-width:900px){
            .auth-container{
                grid-template-columns:1fr;
            }
            .auth-left{
                display:none;
            }
        }
    </style>
</head>

<body>
    <div class="auth-page">
        <div class="auth-container">

            <section class="auth-left">
                <div class="brand">
                    <div class="brand-icon">A</div>
                    <div>
                        <div>APPLOGIN</div>
                        <small>AUTHENTICATION SYSTEM</small>
                    </div>
                </div>

                <h1>Acceso seguro a la plataforma académica</h1>

                <p>
                    Sistema web desarrollado con Laravel, MySQL, sesiones protegidas
                    y autenticación mediante Google OAuth.
                </p>

                <div class="quote">
                    Seguridad, organización y control de acceso para usuarios registrados.
                </div>

                <div class="footer">
                    © 2026 AppLogin — Desarrollado por Pedro Taboada
                </div>
            </section>

            <section class="auth-right">
                <div class="auth-card">
                    {{ $slot }}
                </div>
            </section>

        </div>
    </div>
</body>
</html>