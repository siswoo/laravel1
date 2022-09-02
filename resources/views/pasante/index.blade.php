@extends('layouts.main')
@section('content')

        <div class="row" style="padding: 30px 50px;">
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Listado de Pasantes</div>    
            <div class="col-12">
                <table class="table table-striped mt-5">
                    @csrf
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Documento Tipo</th>
                            <th>Documento Número</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Estatus</th>
                            <th>Creación</th>
                            <th class="text-center">Opciones</th>
                            <th class="text-center">Cambio Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasantes as $item)
                            <tr>
                                <td>{{$item->users_nombre." ".$item->users_apellido}}</td>
                                <td>{{$item->users_documento_tipo}}</td>
                                <td>{{$item->users_documento_numero}}</td>
                                <td>{{$item->users_email}}</td>
                                <td>{{$item->users_telefono}}</td>
                                @if ($item->pasantes_estatus==1)
                                    <td>Proceso</td>
                                @elseif ($item->pasantes_estatus==2)
                                    <td>Activo</td>
                                @else
                                    <td>Inactivo</td>
                                @endif
                                <td>{{$item->pasantes_created_at}}</td>
                                <td class="text-center">
                                    @if ($item->pasantes_estatus==1)
                                    <a href="../pasantes/{{$item->pasantes_sede}}/{{$item->pasantes_id}}">
                                        <button type="button" class="btn btn-primary">Modificar</button>
                                    </a>
                                    @else
                                        <button type="button" class="btn btn-primary" disabled>Modificar</button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->pasantes_estatus==1)
                                        <button type="button" class="btn btn-success" onclick="aceptar1({{$item->pasantes_id}});">Aceptar</button>
                                        <button type="button" class="btn btn-danger" onclick="rechazar1({{$item->pasantes_id}});">Rechazar</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $pasantes->links() !!}
                </div>
            </div>
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
        }

        function aceptar1(id){
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¿Desea cambiar el estatus de dicho registro?",
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Aceptarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if(result.value){
                    var _token = $('input[name=_token]').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{route('pasantes.aceptar1')}}",
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
                            }else if(respuesta["estatus"]=="ok"){
                                Swal.fire({
                                    title: 'Listo',
                                    text: respuesta["msg"],
                                    icon: 'success',
                                    showConfirmButton: true,
                                });
                                setTimeout(function(){
                                    //window.location = "{{url()->previous()}}";
                                    window.location = "{{url()->current()}}";
                                }, 5000);
                            } 
                        },

                        error: function(respuesta){
                            console.log(respuesta['responseText']);
                        }
                    });
                }
            });
        }

        function rechazar1(id){
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¿Desea cambiar el estatus de dicho registro?",
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Rechazarlo',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if(result.value){
                    var _token = $('input[name=_token]').val();
                    $.ajax({
                        type: 'POST',
                        url: "{{route('pasantes.rechazar1')}}",
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
                            }else if(respuesta["estatus"]=="ok"){
                                Swal.fire({
                                    title: 'Listo',
                                    text: respuesta["msg"],
                                    icon: 'success',
                                    showConfirmButton: true,
                                });
                                setTimeout(function(){
                                    //window.location = "{{url()->previous()}}";
                                    window.location = "{{url()->current()}}";
                                }, 3000);
                            } 
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
