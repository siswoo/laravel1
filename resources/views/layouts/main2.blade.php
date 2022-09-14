@include('layouts.partials.header')
<body style="background-color:#00000029;">
    <div class="container" style="margin-top: 3rem;">
        <form action="#" method="POST" id="formulario1">
            @csrf
            @method('put')
            <div class="row" style="background-color: white;">
                <div class="col-12 text-center" style="font-weight: bold; font-size: 22px;">Para continuar necesitas Cambiar tu clave</div>
                <div class="col-12">
                    <label for="password">Nueva Clave</label>
                    <input type="password" id="password" name="password" autocomplete="off" class="form-control" required>
                </div>
                <div class="col-12 mt-3">
                    <label for="password2">Repetir Nueva Clave</label>
                    <input type="password" id="password2" name="password2" autocomplete="off" class="form-control" required>
                </div>
                <div class="col-12 mt-3 mb-3 text-center">
                    <button type="submit" class="btn btn-success" style="font-weight: bold; font-size: 22px;" id="submit1">Guardar Clave</button>
                </div>
            </div>
        </form>
    </div>
    @include('layouts.partials.footer')
</body>
</html>

<script>
    $("#formulario1").on('submit', function(e){
        e.preventDefault();
        var password = $('#password').val();
        var password2 = $('#password2').val();
        var _token = $('input[name=_token]').val();
        if(password!=password2){
            Swal.fire({
                title: 'Error',
                text: 'Las claves no coinciden, por favor vuelve a intentarlo',
                icon: 'error',
                showConfirmButton: true,
            });
            $('#password').val('');
            $('#password2').val('');
            return false;
        }
        $.ajax({
            type: 'PUT',
            url: "{{route('lobby.primer_login')}}",
            dataType: "JSON",
            data: {
                'id': {{$usuarios->id}},
                'password': password,
                'password2': password2,
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
                window.location = "{{route('lobby.index')}}";
            },

            error: function(respuesta){
                $('#submit1').prop('disabled', false);
                console.log(respuesta['responseText']);
            }
        });
    });
</script>