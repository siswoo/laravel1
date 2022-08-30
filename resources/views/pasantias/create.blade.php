@extends('layouts.main')
@section('content')

    <form action="#" id="formulario1" method="POST">
        @csrf
        <div class="row" style="padding: 30px 50px;">
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Creacion de un Nuevo Pasante</div>
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
                <input type="text" class="form-control" name="documento_numero" id="documento_numero" required autocomplete="off" value="{{old('documento_numero')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" value="{{old('nombre')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required autocomplete="off" value="{{old('apellido')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="email">Correo</label>
                <input type="email" class="form-control" name="email" id="email" required autocomplete="off" value="{{old('email')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="email2">Repetir Correo</label>
                <input type="email" class="form-control" name="email2" id="email2" required autocomplete="off">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="telefono">Número de Teléfono</label>
                <input type="text" class="form-control" name="telefono" id="telefono" required autocomplete="off" value="{{old('telefono')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="barrio">Barrio</label>
                <input type="text" class="form-control" name="barrio" id="barrio" required autocomplete="off" value="{{old('barrio')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="direccion">Dirección</label>
                <textarea name="direccion" id="direccion" cols="30" rows="10" class="form-control">{{old('direccion')}}</textarea>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="genero">Género</label>
                <select name="genero" id="genero" class="form-control" required value="{{old('genero')}}">
                    <option value="">Seleccione</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Transexual">Transexual</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="entero">¿Como te has enterado de Camaleón?</label>
                <select name="entero" id="entero" class="form-control" required value="{{old('entero')}}">
                    <option value="">Seleccione</option>
                    <option value="Facebook">Facebook</option>
                    <option value="Twitter">Twitter</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Página Web">Página Web</option>
                    <option value="Conocido">Conocido</option>
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
            var documento_tipo = $('#documento_tipo').val();
            var documento_numero = $('#documento_numero').val();
            var nombre = $('#nombre').val();
            var apellido = $('#apellido').val();
            var email = $('#email').val();
            var email2 = $('#email2').val();
            var telefono = $('#telefono').val();
            var barrio = $('#barrio').val();
            var direccion = $('#direccion').val();
            var genero = $('#genero').val();
            var entero = $('#entero').val();
            var estatus = 1;
            var _token = $('input[name=_token]').val();

            if(email!=email2){
                Swal.fire({
                    title: 'Error',
                    text: "Los Correos no son iguales, verifique por favor",
                    icon: 'error',
                    showConfirmButton: true,
                });
                return false;
            }

            $.ajax({
                type: 'POST',
                url: "{{route('pasantiaVipStore.store')}}",
                dataType: "JSON",
                data: {
                    'nombre': nombre,
                    'apellido': apellido,
                    'documento_tipo': documento_tipo,
                    'documento_numero': documento_numero,
                    'email': email,
                    'telefono': telefono,
                    'barrio': barrio,
                    'direccion': direccion,
                    'genero': genero,
                    'entero': entero,
                    'estatus': estatus,
                    '_token': _token,
                },

                beforeSend: function(){
                    $('#submit1').prop('disabled', true);
                },
                
                success: function(respuesta){
                    console.log(respuesta);
                    if(respuesta["estatus"]=="error"){
                        Swal.fire({
                            title: 'Error',
                            text: respuesta["msg"],
                            icon: 'error',
                            showConfirmButton: true,
                        });
                        $('#submit1').prop('disabled', false);
                        return false;
                    }else if(respuesta["estatus"]=="ok"){
                        Swal.fire({
                            title: 'Felicidades',
                            text: respuesta["msg"],
                            icon: 'success',
                            showConfirmButton: true,
                        });
                        setTimeout(function(){
                            window.location = "{{route('pasantias.create')}}";
                        }, 10000);
                    }
                },

                error: function(respuesta){
                    $('#submit1').prop('disabled', false);
                    console.log(respuesta['responseText']);
                }
            });
        });

    </script>

@endsection
