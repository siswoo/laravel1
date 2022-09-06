@extends('layouts.main')
@section('content')

    <form action="#" id="formulario1" method="POST">
        @csrf
        @method('put')
        <div class="row" style="padding: 30px 50px;">
            @if ($usuario->id=='')
                <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">El Modulo al cual intenta ingresar ya no existe</div>    
            @else
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Edición de un Usuario</div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" autofocus value="{{$usuario->nombre}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required autocomplete="off" autofocus value="{{$usuario->apellido}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_tipo">Documento Tipo</label>
                <select name="documento_tipo" id="documento_tipo" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Cedula de Ciudadania" @if ($usuario->documento_tipo=='Cedula de Ciudadania') selected @endif>Cedula de Ciudadania</option>
                    <option value="Cedula de Extranjeria" @if ($usuario->documento_tipo=='Cedula de Extranjeria') selected @endif>Cedula de Extranjeria</option>
                    <option value="Pasaporte" @if ($usuario->documento_tipo=='Pasaporte') selected @endif>Pasaporte</option>
                    <option value="PEP" @if ($usuario->documento_tipo=='PEP') selected @endif>PEP</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_numero">Documento Número</label>
                <input type="text" class="form-control" name="documento_numero" id="documento_numero" required autocomplete="off" autofocus value="{{$usuario->documento_numero}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" name="usuario" id="usuario" required autocomplete="off" autofocus value="{{$usuario->usuario}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="email">Correo</label>
                <input type="email" class="form-control" name="email" id="email" required autocomplete="off" autofocus value="{{$usuario->email}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="estatus">Estatus</label>
                <select name="estatus" id="estatus" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="1" @if ($usuario->estatus==1) selected @endif>Activo</option>
                    <option value="2" @if ($usuario->estatus==2) selected @endif>Inactivo</option>
                </select>
            </div>
            <div class="col-12 text-center" style="margin-top: 2rem;">
                <button type="submit" class="btn btn-success" id="submit1" style="font-size:20px;">Editar Registro</button>
            </div>
        @endif
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
            var email = $('#email').val();
            var estatus = $('#estatus').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: 'PUT',
                url: "{{route('usuarios.update')}}",
                dataType: "JSON",
                data: {
                    'id': {{$usuario->id}},
                    'nombre': nombre,
                    'apellido': apellido,
                    'documento_tipo': documento_tipo,
                    'documento_numero': documento_numero,
                    'usuario': usuario,
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
