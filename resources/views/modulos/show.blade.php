@extends('layouts.main')
@section('content')

    <form action="#" id="formulario1" method="POST">
        @csrf
        @method('put')
        <div class="row" style="padding: 30px 50px;">
            @if ($modulos->id=='')
                <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">El Modulo al cual intenta ingresar ya no existe</div>    
            @else
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Edición de un Módulo</div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" autofocus value="{{$modulos->nombre}}">
                </div>
                <div class="col-12" style="margin-top: 1rem;">
                    <label for="id_roles">Rol</label>
                    <select name="id_roles" id="id_roles" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($roles as $rol)
                            <option @if($modulos->id_roles==$rol->id) selected @endif value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12" style="margin-top: 1rem;">
                    <label for="route">Ruta</label>
                    <input type="text" class="form-control" name="route" id="route" required autocomplete="off" autofocus value="{{$modulos->route}}">
                </div>
                <div class="col-12" style="margin-top: 1rem;">
                    <label for="estatus">Estatus</label>
                    <select name="estatus" id="estatus" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="1" @if ($modulos->estatus==1) selected @endif>Activo</option>
                        <option value="2" @if ($modulos->estatus==2) selected @endif>Inactivo</option>
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
            var id_roles = $('#id_roles').val();
            var route = $('#route').val();
            var estatus = $('#estatus').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: 'PUT',
                url: "{{route('modulos.update')}}",
                dataType: "JSON",
                data: {
                    'id': {{$modulos->id}},
                    'nombre': nombre,
                    'id_roles': id_roles,
                    'route': route,
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
                    window.location = "{{route('modulos.index')}}";
                },

                error: function(respuesta){
                    $('#submit1').prop('disabled', false);
                    console.log(respuesta['responseText']);
                }
            });
        });

    </script>

@endsection
