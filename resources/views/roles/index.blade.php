@extends('layouts.main')
@section('content')

        <div class="row" style="padding: 30px 50px;">
            <div class="col-12" style="margin-bottom: 2rem;">
                <a href="{{route('roles.create')}}">
                    <button type="button" class="btn btn-success">Nuevo Registro</button>
                </a>
            </div>
            <div class="col-12">
                <table class="table table-striped mt-5">
                    @csrf
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estatus</th>
                            <th>Creación</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $item)
                            <tr>
                                <td>{{$item->nombre}}</td>
                                @if ($item->estatus==1)
                                    <td>Activo</td>
                                @else
                                    <td>Inactivo</td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                <td class="text-center">
                                    <a href="roles/{{$item->id}}">
                                        <button type="button" class="btn btn-primary">Modificar</button>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="deleted1({{$item->id}});">Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $roles->links() !!}
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

        function deleted1(id){
            Swal.fire({
            title: '¿Estas seguro?',
            text: "¿Desea eliminar dicho registro?",
            icon: 'warning',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if(result.value){
                var _token = $('input[name=_token]').val();
                $.ajax({
                    type: 'POST',
                    url: "{{route('roles.destroy')}}",
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
                        window.location = "{{route('roles.index')}}";
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
