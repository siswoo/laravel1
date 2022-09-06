@extends('layouts.main')
@section('content')

    <form action="#" id="formulario1" method="POST">
        @csrf
        @method('put')
        <div class="row" style="padding: 30px 50px;">
            @if ($pasante=='')
                <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">El Pasante que intenta consultar no existe en tu sede</div>    
            @else
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Edición de un Pasante</div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" autofocus value="{{$pasante->users_nombre}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required autocomplete="off" value="{{$pasante->users_apellido}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_tipo">Documento Tipo</label>
                <select name="documento_tipo" id="documento_tipo" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Cedula de Ciudadania" @if ($pasante->users_documento_tipo=='Cedula de Ciudadania') selected @endif>Cedula de Ciudadania</option>
                    <option value="Cedula de Extranjeria" @if ($pasante->users_documento_tipo=='Cedula de Extranjeria') selected @endif>Cedula de Extranjeria</option>
                    <option value="Pasaporte" @if ($pasante->users_documento_tipo=='Pasaporte') selected @endif>Pasaporte</option>
                    <option value="PEP" @if ($pasante->users_documento_tipo=='PEP') selected @endif>PEP</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_numero">Documento Número</label>
                <input type="text" class="form-control" name="documento_numero" id="documento_numero" required autocomplete="off" value="{{$pasante->users_documento_numero}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefono" required autocomplete="off" value="{{$pasante->users_telefono}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="email">Correo</label>
                <input type="email" class="form-control" name="email" id="email" required autocomplete="off" value="{{$pasante->users_email}}">
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
            var telefono = $('#telefono').val();
            var email = $('#email').val();
            var _token = $('input[name=_token]').val();
            var id = {{$id_final}};
            $.ajax({
                type: 'PUT',
                url: "{{route('pasantes.update')}}",
                dataType: "JSON",
                data: {
                    'id': id,
                    'nombre': nombre,
                    'apellido': apellido,
                    'documento_tipo': documento_tipo,
                    'documento_numero': documento_numero,
                    'telefono': telefono,
                    'email': email,
                    '_token': _token,
                },

                beforeSend: function(){
                    $('#submit1').prop('disabled', true);
                },
                
                success: function(respuesta){
                    console.log(respuesta);
                    if(respuesta["estatus"]=="error"){
                        $('#submit1').prop('disabled', false);
                        Swal.fire({
                            title: 'Error',
                            text: respuesta["msg"],
                            icon: 'error',
                            showConfirmButton: true,
                        });
                        return false;
                    }
                    window.location = "{{url()->previous()}}";
                },

                error: function(respuesta){
                    $('#submit1').prop('disabled', false);
                    console.log(respuesta['responseText']);
                }
            });
        });

    </script>

@endsection
