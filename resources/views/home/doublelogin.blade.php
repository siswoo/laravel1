<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/favicon1.webp') }}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>CamaleonMG</title>
</head>
<style>
html,body{
  height: 100%;
  width: 100%;
  font-family: 'Montserrat';
}
</style>
<body>
    <div class="container">
        <div class="row">
            @auth
                <div class="col-12 text-center" style="margin-top: 6rem;font-weight:bold;font-size:22px;">Han Ingresado a su cuenta desde otro Dispositivo <a href="{{route("logout.logout2")}}">Ir al Inicio</a></div>
            @endauth
            @guest
            <div class="col-12 text-center" style="margin-top: 6rem;font-weight:bold;font-size:22px;">No tienes Permisos para ver el contenido de esta página <a href="{{route("home.index")}}">Ir al Inicio</a></div>
            @endguest
        </div>
    </div>
</body>
</html>
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script></script>