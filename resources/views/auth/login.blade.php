<!DOCTYPE html>
<html lang="es">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@400..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <!--Video background -->
    <video autoplay muted loop class="video-bg">
        <source src="{{ asset('img/fondo.mp4') }}" type="video/mp4">
    </video>

    <!--Overlay blanco -->
    <div class="screen-container">
        <div class="login-container">
            <div class="box-login">
                <span>Ingresar Al Sistema</span>
                <form action="{{ route('login') }}" method="post" autocomplete="off">
                    @csrf
                    <input type="text" name="id_usuario" placeholder="Id De Usuario">
                    <br>
                    <input type="password" name="password" placeholder="Password">
                    @if ($errors->any())
                    <div style="color:red;">
                        {{ $errors->first() }}
                    </div>
                    @endif
                    <br>
                    <div class="btnlogin-container">
                    <button type="submit">Ingresar</button>
                    </div>
                </form>
            </div>
            <div class="box-login">
                <img src="{{ asset('img/logoblanco.svg') }}" alt="logo_blanco" id="logo">
                <h1>SIRAS</h1>
                <p>Sistema Integral De Redes,<br>Almacenamiento Y Servidores.</p>
            </div>
        </div>
    </div>
</body>
</html>