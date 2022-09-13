@extends('layouts.main')
@section('content')

        <div class="row" style="padding: 30px 50px;">
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Listado de Modelos</div>    
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
                            <th class="text-center">Documentos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($modelos as $item)
                            <tr>
                                <td>{{$item->users_nombre." ".$item->users_apellido}}</td>
                                <td>{{$item->users_documento_tipo}}</td>
                                <td>{{$item->users_documento_numero}}</td>
                                <td>{{$item->users_email}}</td>
                                <td>{{$item->users_telefono}}</td>
                                @if ($item->modelos_estatus==1)
                                    <td>Activo</td>
                                @elseif ($item->modelos_estatus==2)
                                    <td>Inactivo</td>
                                @endif
                                <td>{{$item->modelos_created_at}}</td>
                                <td class="text-center">
                                    @if ($item->modelos_estatus==1)
                                    <a href="../modelos/{{$item->modelos_sede}}/{{$item->modelos_id}}">
                                        <button type="button" class="btn btn-primary">Modificar</button>
                                    </a>
                                    @else
                                        <button type="button" class="btn btn-primary" disabled>Modificar</button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->modelos_estatus==1)
                                        <a href="../modelos/documentos/{{$item->modelos_sede}}/{{$item->modelos_id}}" target="_blank">
                                            <button type="button" class="btn btn-primary" onclick="documentos1({{$item->modelos_id}});">Ver Documentos</button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $modelos->links() !!}
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

        function documentos1(id){
            //
        }

    </script>

@endsection
