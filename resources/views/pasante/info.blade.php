@extends('layouts.main')
@section('content')

    @if($pasante=='')
        <div class="row" style="padding: 30px 50px;">
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">No cuenta con un registro de Pasante</div>    
        </div>
    @else
        <form action="#" id="formulario1" method="POST">
            @csrf
            @method('put')
            <div class="row" style="padding: 30px 50px;">
                <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Información como Pasante</div>
                <div class="col-12" style="margin-top: 1rem;">
                    <label for="created_at">Fecha de Registro</label>
                    <input type="text" class="form-control" name="created_at" id="created_at" required autocomplete="off" readonly value="{{$pasante->created_at}}">
                </div>
                <div class="col-12" style="margin-top: 1rem;">
                    <label for="sede">Sede</label>
                    <input type="text" class="form-control" name="sede" id="sede" required autocomplete="off" readonly value="{{$sede->nombre}}">
                </div>
                <div class="col-12" style="margin-top: 1rem;">
                    <label for="estatus">Estatus</label>
                    <input type="text" class="form-control" name="estatus" id="estatus" required autocomplete="off" readonly value="{{$estatus}}">
                </div>
                <div class="col-12" style="margin-top: 1rem;">
                    <label for="updated_at">Estatus Cambiado</label>
                    <input type="text" class="form-control" name="updated_at" id="updated_at" required autocomplete="off" readonly value="{{$pasante->updated_at}}">
                </div>
            </div>
        </form>
    @endif

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

    </script>

@endsection
