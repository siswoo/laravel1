@extends('layouts.main')
@section('content')

    <form action="#" id="formulario1" method="POST">
        @csrf
        <div class="row" style="padding: 30px 50px;">
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Creación de una Nueva Sede</div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" autofocus value="{{old('nombre')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="direccion">Dirección</label>
                <textarea name="direccion" id="direccion" cols="30" rows="10" class="form-control">{{old('direccion')}}</textarea>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" name="ciudad" id="ciudad" autocomplete="off" value="{{old('ciudad')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" autocomplete="off" value="{{old('descripcion')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="responsable">Responsable</label>
                <input type="text" class="form-control" name="responsable" id="responsable" autocomplete="off" value="{{old('responsable')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="cedula">Cédula</label>
                <input type="text" class="form-control" name="cedula" id="cedula" autocomplete="off" value="{{old('cedula')}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="rut">Rut</label>
                <input type="text" class="form-control" name="rut" id="rut" autocomplete="off" value="{{old('rut')}}">
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
            var direccion = $('#direccion').val();
            var ciudad = $('#ciudad').val();
            var descripcion = $('#descripcion').val();
            var responsable = $('#responsable').val();
            var cedula = $('#cedula').val();
            var rut = $('#rut').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: 'POST',
                url: "{{route('sedes.store')}}",
                dataType: "JSON",
                data: {
                    'nombre': nombre,
                    'direccion': direccion,
                    'ciudad': ciudad,
                    'descripcion': descripcion,
                    'responsable': responsable,
                    'cedula': cedula,
                    'rut': rut,
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
                    window.location = "{{route('sedes.index')}}";
                },

                error: function(respuesta){
                    $('#submit1').prop('disabled', false);
                    console.log(respuesta['responseText']);
                }
            });
        });

    </script>

@endsection
