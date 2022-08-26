@extends('layouts.main')
@section('content')
        <div class="row text-center">
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Administradores
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">1</p>
                    <small>Registrados</small>
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Pasantes
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-male-alt"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">100</p>
                    <small>Registrados</small>
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Modelos
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-face"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">70</p>
                    <small>Registrados</small>
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Nóminas
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-male-female"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">70</p>
                    <small>Registrados</small>
                </div>
            </article>
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
    </script>

@endsection
