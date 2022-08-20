<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <title>Registro</title>
</head>
<body>
    <form action="{{route('register.store')}}" method="POST">
        @csrf
        <div class="container mt-3">
            <div class="row">
                <div class="col-12 text-center"><h1>Nuevo Registro de Usuario</h1></div>
                <div class="col-12 mt-1">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-1">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{old('apellido')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-1">
                    <label for="documento_tipo">Documento Tipo</label>
                    <select name="documento_tipo" id="documento_tipo" class="form-control">
                        <option value="Seleccione">Seleccione</option>
                        <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                        <option value="PEP">PEP</option>
                        <option value="Pasaporte">Pasaporte</option>
                    </select>
                </div>
                <div class="col-12 mt-1">
                    <label for="documento_numero">Documento Número</label>
                    <input type="text" class="form-control" name="documento_numero" id="documento_numero" value="{{old('documento_numero')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-1">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" value="{{old('usuario')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-1">
                    <label for="password">Clave</label>
                    <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-1">
                    <label for="rol1">Rol</label>
                    <input type="text" class="form-control" name="rol1" id="rol1" value="{{old('rol1')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-1">
                    <label for="email">Correo</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}" autocomplete="off">
                </div>
                <div class="col-12 mt-1 text-center">
                    <button type="submit" class="btn btn-success" style="font-weigth:bold; font-size:20px;">Registrar</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>