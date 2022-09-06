@extends('layouts.main')
@section('content')

    <form action="#" id="formulario1" method="POST">
        @csrf
        <div class="row" style="padding: 30px 50px;">
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Creación de un Nuevo Rol</div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" autofocus value="{{old('nombre')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required autocomplete="off" autofocus value="{{old('apellido')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_tipo">Tipo de Documento</label>
                <select name="documento_tipo" id="documento_tipo" class="form-control" required value="{{old('documento_tipo')}}">
                    <option value="">Seleccione</option>
                    <option value="Cedula de Ciudadania">Cedula de Ciudadania</option>
                    <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="PEP">PEP</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_numero">Número de Documento</label>
                <input type="text" class="form-control" name="documento_numero" id="documento_numero" required autocomplete="off" autofocus value="{{old('documento_numero')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" required autocomplete="off" autofocus value="{{old('usuario')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="password">Clave</label>
                <input type="password" class="form-control" name="password" id="password" required autocomplete="off" autofocus value="{{old('password')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="email">Correo</label>
                <input type="email" class="form-control" name="email" id="email" required autocomplete="off" autofocus value="{{old('email')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="estatus">Estatus</label>
                <select name="estatus" id="estatus" class="form-control" required value="{{old('estatus')}}">
                    <option value="">Seleccione</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                </select>
            </div>
            <div class="col-12 text-center" style="margin-top: 2rem;">
                <button type="submit" class="btn btn-success" id="submit1" style="font-size:20px;">Guardar Registro</button>
            </div>
        </div>
    </form>

    <script>

        function cerrarSession1(id){
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Esto Cerrará tus cuentas Activas",
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deseo Cerrar mi Acceso',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if(result.value){
                    window.location = "{{route('logout.logout')}}";
                }
            });
        };
        
        $("#formulario1").on('submit', function(e){
            e.preventDefault();
            var nombre = $('#nombre').val();
            var apellido = $('#apellido').val();
            var documento_tipo = $('#documento_tipo').val();
            var documento_numero = $('#documento_numero').val();
            var usuario = $('#usuario').val();
            var password = $('#password').val();
            var email = $('#email').val();
            var estatus = $('#estatus').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: 'POST',
                url: "{{route('usuarios.store')}}",
                dataType: "JSON",
                data: {
                    'nombre': nombre,
                    'apellido': apellido,
                    'documento_tipo': documento_tipo,
                    'documento_numero': documento_numero,
                    'usuario': usuario,
                    'password': password,
                    'email': email,
                    'estatus': estatus,
                    '_token': _token,
                },

                beforeSend: function(){
                    $('#submit1').prop('disabled', true);
                },
                
                success: function(respuesta){
                    console.log(respuesta);
                    $('#submit1').prop('disabled', false);
                    if(respuesta["estatus"]=="error"){
                        Swal.fire({
                            title: 'Error',
                            text: respuesta["msg"],
                            icon: 'error',
                            showConfirmButton: true,
                        });
                        return false;
                    }
                    window.location = "{{route('usuarios.index')}}";
                },

                error: function(respuesta){
                    $('#submit1').prop('disabled', false);
                    console.log(respuesta['responseText']);
                }
            });
        });

    </script>

@endsection
