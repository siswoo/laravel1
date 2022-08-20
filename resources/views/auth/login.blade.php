<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>
<body>
    <form action="{{route('login.login')}}" method="POST">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-12 text-center" style="font-weight:bold;font-size:20px;">Ingrese sus datos de usuario</div>
                <div class="col-12 mt-3">
                    <label for="usuario" style="font-weight: bold;">Usuario ó Correo</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('nombre')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-3">
                    <label for="password" style="font-weight: bold;">Clave</label>
                    <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                </div>
                <div class="col-12 text-center mt-3">
                    <button type="submit" class="btn btn-success" style="font-weight: bold; font-size: 20px;">Logearse</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>