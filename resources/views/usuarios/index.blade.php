@extends('layouts.main')
@section('content')

        <div class="row" style="padding: 30px 50px;">
            <div class="col-12" style="margin-bottom: 2rem;">
                <a href="{{route('usuarios.create')}}">
                    <button type="button" class="btn btn-success">Nuevo Registro</button>
                </a>
            </div>

            <div class="col-12" style="margin-bottom: 2rem;">
                <form id="formulario1" action="{{route('usuarios.index')}}" method="get">
                    <div class="row">
                        <div class="col-3">
                            <label for="filtrar_nombre">Filtrar Nombre</label>
                            <input type="text" class="form-control" name="filtrar_nombre" id="filtrar_nombre" autocomplete="off" @if($filtrar_nombre!='') value="{{$filtrar_nombre}}" @endif>
                        </div>
                        <div class="col-3">
                            <label for="filtrar_apellido">Filtrar Apellido</label>
                            <input type="text" class="form-control" name="filtrar_apellido" id="filtrar_apellido" autocomplete="off" @if($filtrar_apellido!='') value="{{$filtrar_apellido}}" @endif>
                        </div>
                        <div class="col-3">
                            <label for="filtrar_documento">Filtrar Documento</label>
                            <input type="text" class="form-control" name="filtrar_documento" id="filtrar_documento" autocomplete="off" @if($filtrar_documento!='') value="{{$filtrar_documento}}" @endif>
                        </div>
                        <div class="col-3" style="margin: auto;">
                            <button type="submit" class="btn btn-primary" id="submit1">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <table class="table table-bordered table-striped" id="data-table">
                @csrf
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Correo</td>
                        <td>Roles</td>
                        <td>Opciones</td>
                    </tr>
                </thead>
                <tbody>
                    @if($contador2>=1)
                        @foreach ($usuarios2 as $item)
                            <tr>
                                <td>{{$item->nombre}}</td>
                                <td>{{$item->apellido}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    @if(@$html2[$item->id]!='')
                                        {!!$html2[$item->id]!!}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('usuarios.show',$item->id)}}">
                                        <button type="button" class="btn btn-primary">Editar</button>
                                    </a>
                                    <button type="button" class="btn btn-danger" onclick="deleted1({{$item->id}});">Eliminar</button>
                                    <a href="{{route('usuarios.createRol',$item->id)}}">
                                        <button type="button" class="btn btn-info">Agregar Rol</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="4" class="text-center">No hay resultados</td>
                            </tr>
                    @endif
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
                    url: "{{route('usuarios.destroy')}}",
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
                        window.location = "{{route('usuarios.index')}}";
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
