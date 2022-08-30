@extends('layouts.main')
@section('content')

    <div class="row" style="padding: 30px 50px;">
        <div class="col-12" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:2rem;">Gestionar los Roles de Usuario</div>
        @if($contador2>=1)
            <div class="col-12 text-center" style="font-weight: bold; text-transform:uppercase; margin-top:2rem;">Los Roles que tiene el usuario</div>
            @foreach ($usersroles as $item)
                <div class="col-4 text-center" style="margin-top: 1rem;">
                    <p><strong>{{$item->roles_nombre}}</strong></p>
                    <button type="button" class="btn btn-danger" onclick="remover1({{$item->users_roles_id}});">Remover</button>
                </div>
            @endforeach
        @endif

        <div class="col-12 text-center" style="font-weight: bold; text-transform:uppercase; margin-top:2rem;">Colocar Nuevo Rol</div>
        <form id="formulario1" action="{{route('UsersRoles.store')}}" method="POST">
            @csrf
            <div class="row" style="margin-top:2rem;">
                <div class="col-6">
                    <label for="id_roles">Roles Disponibles</label>
                    <select name="id_roles" id="id_roles" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach ($roles as $rol)
                            <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <button type="submit" class="btn btn-success" style="margin-top:1.5rem;">Crear Nuevo Enlace</button>
                </div>
            </div>
        </form>
    </div>

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
            var id_roles = $('#id_roles').val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: 'POST',
                url: "{{route('UsersRoles.store')}}",
                dataType: "JSON",
                data: {
                    'id_users': {{$usuario_id}},
                    'id_roles': id_roles,
                    '_token': _token,
                },

                beforeSend: function(){},
                
                success: function(respuesta){
                    console.log(respuesta);
                    if(respuesta["estatus"]=="error"){
                        Swal.fire({
                            title: 'Error',
                            text: respuesta["msg"],
                            icon: 'error',
                            showConfirmButton: true,
                        });
                        return false;
                    }
                    window.location = "{{Request::fullUrl()}}";
                },

                error: function(respuesta){
                    console.log(respuesta['responseText']);
                }
            });
        });

        function remover1(id){
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Esto Eliminara el Rol",
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deseo Eliminarla',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if(result.value){
                    var _token = $('input[name=_token]').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{route('UsersRoles.destroy')}}",
                        dataType: "JSON",
                        data: {
                            'id': id,
                            '_token': _token,
                        },

                        beforeSend: function(){},
                        
                        success: function(respuesta){
                            console.log(respuesta);
                            if(respuesta["estatus"]=="error"){
                                Swal.fire({
                                    title: 'Error',
                                    text: respuesta["msg"],
                                    icon: 'error',
                                    showConfirmButton: true,
                                });
                                return false;
                            }
                            window.location = "{{Request::fullUrl()}}";
                        },

                        error: function(respuesta){
                            console.log(respuesta['responseText']);
                        }
                    });
                }
            });
        }

    </script>

@endsection
