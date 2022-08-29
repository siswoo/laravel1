@extends('layouts.main')
@section('content')

        <div class="row" style="padding: 30px 50px;">
            <div class="col-12" style="margin-bottom: 2rem;">
                <a href="{{route('usuarios.create')}}">
                    <button type="button" class="btn btn-success">Nuevo Registro</button>
                </a>
            </div>

            <!--
            <form id="formulario1" action="{{route('usuarios.index')}}" method="get">
                <div class="row">
                    <div class="col-3">
                        <label for="filtrar_nombre">Filtrar Nombre</label>
                        <input type="text" class="form-control" name="filtrar_nombre" id="filtrar_nombre" autocomplete="off">
                    </div>
                    <div class="col-3">
                        <label for="filtrar_apellido">Filtrar Apellido</label>
                        <input type="text" class="form-control" name="filtrar_apellido" id="filtrar_apellido" autocomplete="off">
                    </div>
                    <div class="col-3">
                        <label for="filtrar_documento">Filtrar Documento</label>
                        <input type="text" class="form-control" name="filtrar_documento" id="filtrar_documento" autocomplete="off">
                    </div>
                    <div class="col-3" style="margin: auto;">
                        <button type="submit" class="btn btn-primary" id="submit1">Filtrar</button>
                    </div>
                </div>
            </form>
            -->

            <table class="table table-bordered table-striped" id="data-table">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Correo</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios2 as $item)
                        <tr>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->apellido}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="{{route('usuarios.show',$item->id)}}">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>
                                <a href="{{route('usuarios.deleted',$item->id)}}">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {!! $usuarios2->links() !!}
            </div>
            
            <!--
            <div class="col-12">
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento Tipo</th>
                            <th>Documento Número</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Estatus</th>
                            <th>Creado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios2 as $item)
                            <tr>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->apellido}}</td>
                                <td>{{$item->documento_tipo}}</td>
                                <td>{{$item->documento_numero}}</td>
                                <td>{{$item->usuario}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->estatus}}</td>
                                <td>{{$item->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            -->
            
            <!--
            <div class="col-12">
                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Documento Tipo</th>
                            <th>Documento Número</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Estatus</th>
                            <th>Creación</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuarios2 as $item)
                            <tr>
                                <td>{{$item->nombre." ".$item->apellido}}</td>
                                <td>{{$item->documento_tipo}}</td>
                                <td>{{$item->documento_numero}}</td>
                                <td>{{$item->usuario}}</td>
                                <td>{{$item->email}}</td>
                                @if ($item->estatus==1)
                                    <td>Activo</td>
                                @else
                                    <td>Inactivo</td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                <td class="text-center">
                                    <a href="usuarios/{{$item->id}}">
                                        <button type="button" class="btn btn-primary">Modificar</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $usuarios2->links() !!}
                </div>
            </div>
            -->
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
    </script>

@endsection
