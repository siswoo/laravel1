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
<body style="background-image: url({{asset('img/fondo1.gif')}}?nocache={{time()}});background-position: center;background-repeat: no-repeat;background-size: cover;position: relative;overflow: hidden;">
    <div class="container">
        <form action="{{route('login.login')}}" method="POST" id="formulario1">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center mt-5">
                    <img src="{{asset('img/logo1.gif')}}?nocache={{time()}}" alt="Logotipo" style="width:800px;" class="img-fluid">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center mt-3" style="color: white; font-weight:bold;font-size:22px;">
                    DATOS DE INGRESO
                </div>
                {!! session()->get('error') !!}
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                    <label for="usuario" style="color:white; font-weight:bold;">Usuario ó Correo</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" autocomplete="off" autofocus>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3">
                    <label for="password" style="color:white; font-weight:bold;">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 text-center mt-3">
                    <button type="submit" class="btn btn-success" style="font-weight: bold; font-size: 20px;">INGRESAR</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    
    $("#formulario1").on('submit', function(e){
        e.preventDefault();
        var usuario = $('#usuario').val();
        var password = $('#password').val();
        var _token = $('input[name=_token]').val();
        $.ajax({
            type: 'POST',
            url: "{{route('login.login')}}",
            dataType: "JSON",
            data: {
            	'usuario': usuario,
                'password': password,
                '_token': _token,
            },

            beforeSend: function(){},
            
            success: function(respuesta){
                if(respuesta["estatus"]=="error"){
                	Swal.fire({
                        title: 'Error',
                        text: respuesta["msg"],
                        icon: 'error',
                        showConfirmButton: true,
                    });
                    return false;
                }
            },
            
            window.location = "{{route('lobby.index')}}";

            error: function(respuesta){
                console.log(respuesta['responseText']);
            }
        });
    });

</script>