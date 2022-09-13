@extends('layouts.main')
@section('content')
    <form action="#" id="formulario1" method="POST">
        @csrf
        @method('put')
        <div class="row" style="padding: 30px 50px;">
            <div class="col-12 text-center" style="font-weight: bold; font-size: 20px; text-transform:uppercase;margin-bottom:1rem;">Edición de datos Bancarios</div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="cpp">¿Cuenta propia o prestada?</label>
                <select name="cpp" id="cpp" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="propia" @if (@$modelobancarios->cpp=='propia') selected @endif>Propia</option>
                    <option value="prestada" @if (@$modelobancarios->cpp=='prestada') selected @endif>Prestada</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_tipo">Tipo de Documento</label>
                <select name="documento_tipo" id="documento_tipo" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Cedula de Ciudadania" @if (@$modelobancarios->documento_tipo=='Cedula de Ciudadania') selected @endif>Cedula de Ciudadania</option>
                    <option value="Cedula de Extranjeria" @if (@$modelobancarios->documento_tipo=='Cedula de Extranjeria') selected @endif>Cedula de Extranjeria</option>
                    <option value="Pasaporte" @if (@$modelobancarios->documento_tipo=='Pasaporte') selected @endif>Pasaporte</option>
                    <option value="PEP" @if (@$modelobancarios->documento_tipo=='PEP') selected @endif>PEP</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="documento_numero">Número de Documento</label>
                <input type="text" class="form-control" name="documento_numero" id="documento_numero" required autocomplete="off" value="{{@$modelobancarios->documento_numero}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required autocomplete="off" value="{{@$modelobancarios->nombre}}">
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="tipo_cuenta">Tipo de Cuenta</label>
                <select name="tipo_cuenta" id="tipo_cuenta" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="ahorro" @if (@$modelobancarios->cpp=='ahorro') selected @endif>ahorro</option>
                    <option value="corriente" @if (@$modelobancarios->cpp=='corriente') selected @endif>corriente</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="banco">Banco</label>
                <select name="banco" class="form-control" id="banco" required="">
                    <option value="">Seleccione</option>
                    <option @if (@$modelobancarios->banco=='Banco Agrario de Colombia') selected @endif value="Banco Agrario de Colombia">Banco Agrario de Colombia</option>
                    <option @if (@$modelobancarios->banco=='Banco AV Villas') selected @endif value="Banco AV Villas">Banco AV Villas</option>
                    <option @if (@$modelobancarios->banco=='Banco Caja Social') selected @endif value="Banco Caja Social">Banco Caja Social</option>
                    <option @if (@$modelobancarios->banco=='Banco de Occidente (Colombia)') selected @endif value="Banco de Occidente (Colombia)">Banco de Occidente (Colombia)</option>
                    <option @if (@$modelobancarios->banco=='Banco Popular (Colombia)') selected @endif value="Banco Popular (Colombia)">Banco Popular (Colombia)</option>
                    <option @if (@$modelobancarios->banco=='Bancolombia') selected @endif value="Bancolombia">Bancolombia</option>
                    <option @if (@$modelobancarios->banco=='BBVA Colombia') selected @endif value="BBVA Colombia">BBVA Colombia</option>
                    <option @if (@$modelobancarios->banco=='BBVA Movil') selected @endif value="BBVA Movil">BBVA Movil</option>
                    <option @if (@$modelobancarios->banco=='Banco de Bogotá') selected @endif value="Banco de Bogotá">Banco de Bogotá</option>
                    <option @if (@$modelobancarios->banco=='Colpatria') selected @endif value="Colpatria">Colpatria</option>
                    <option @if (@$modelobancarios->banco=='Davivienda') selected @endif value="Davivienda">Davivienda</option>
                    <option @if (@$modelobancarios->banco=='ITAU CorpBanca') selected @endif value="ITAU CorpBanca">ITAU CorpBanca</option>
                    <option @if (@$modelobancarios->banco=='Citibank') selected @endif value="Citibank">Citibank</option>
                    <option @if (@$modelobancarios->banco=='GNB Sudameris') selected @endif value="GNB Sudameris">GNB Sudameris</option>
                    <option @if (@$modelobancarios->banco=='ITAU') selected @endif value="ITAU">ITAU</option>
                    <option @if (@$modelobancarios->banco=='Scotiabank') selected @endif value="Scotiabank">Scotiabank</option>
                    <option @if (@$modelobancarios->banco=='Bancoldex') selected @endif value="Bancoldex">Bancoldex</option>
                    <option @if (@$modelobancarios->banco=='JPMorgan') selected @endif value="JPMorgan">JPMorgan</option>
                    <option @if (@$modelobancarios->banco=='BNP Paribas') selected @endif value="BNP Paribas">BNP Paribas</option>
                    <option @if (@$modelobancarios->banco=='Banco ProCredit') selected @endif value="Banco ProCredit">Banco ProCredit</option>
                    <option @if (@$modelobancarios->banco=='Banco Pichincha') selected @endif value="Banco Pichincha">Banco Pichincha</option>
                    <option @if (@$modelobancarios->banco=='Bancoomeva') selected @endif value="Bancoomeva">Bancoomeva</option>
                    <option @if (@$modelobancarios->banco=='Banco Finandina') selected @endif value="Banco Finandina">Banco Finandina</option>
                    <option @if (@$modelobancarios->banco=='Banco CoopCentral') selected @endif value="Banco CoopCentral">Banco CoopCentral</option>
                    <option @if (@$modelobancarios->banco=='Compensar') selected @endif value="Compensar">Compensar</option>
                    <option @if (@$modelobancarios->banco=='Aportes en linea') selected @endif value="Aportes en linea">Aportes en linea</option>
                    <option @if (@$modelobancarios->banco=='Asopagos') selected @endif value="Asopagos">Asopagos</option>
                    <option @if (@$modelobancarios->banco=='Fedecajas') selected @endif value="Fedecajas">Fedecajas</option>
                    <option @if (@$modelobancarios->banco=='Simple') selected @endif value="Simple">Simple</option>
                    <option @if (@$modelobancarios->banco=='Enlace Operativo') selected @endif value="Enlace Operativo">Enlace Operativo</option>
                    <option @if (@$modelobancarios->banco=='CorfiColombiana') selected @endif value="CorfiColombiana">CorfiColombiana</option>
                    <option @if (@$modelobancarios->banco=='Old Mutual') selected @endif value="Old Mutual">Old Mutual</option>
                    <option @if (@$modelobancarios->banco=='Cotrafa') selected @endif value="Cotrafa">Cotrafa</option>
                    <option @if (@$modelobancarios->banco=='Confiar') selected @endif value="Confiar">Confiar</option>
                    <option @if (@$modelobancarios->banco=='JurisCoop') selected @endif value="JurisCoop">JurisCoop</option>
                    <option @if (@$modelobancarios->banco=='Deceval') selected @endif value="Deceval">Deceval</option>
                    <option @if (@$modelobancarios->banco=='Bancamia') selected @endif value="Bancamia">Bancamia</option>
                    <option @if (@$modelobancarios->banco=='Nequi') selected @endif value="Nequi">Nequi</option>
                    <option @if (@$modelobancarios->banco=='Falabella') selected @endif value="Falabella">Falabella</option>
                    <option @if (@$modelobancarios->banco=='DGCPTN') selected @endif value="DGCPTN">DGCPTN</option>
                    <option @if (@$modelobancarios->banco=='BANCO WWB') selected @endif value="BANCO WWB">BANCO WWB</option>
                    <option @if (@$modelobancarios->banco=='Cooperativa Financiera de Antioquia') selected @endif value="Cooperativa Financiera de Antioquia">Cooperativa Financiera de Antioquia</option>
                </select>
            </div>
            <div class="col-12" style="margin-top: 1rem;">
                <label for="numero_cuenta">Número de Cuenta</label>
                <input type="text" class="form-control" name="numero_cuenta" id="numero_cuenta" required autocomplete="off" value="{{@$modelobancarios->nombre}}">
            </div>
            <div id="div_foto_cuenta_prestada" class="col-12" style="margin-top: 1rem; display:none;">
                <label for="foto">Foto de Cuenta Prestada</label>
                @if(@$modelobancarios->foto!='')
                    <img src="" alt="">
                @endif
				<input type="file" name="acta_cuenta_prestada" id="acta_cuenta_prestada" class="form-control">
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            if({{@$modelobancarios->cpp=='prestada'}}){
                $('#div_foto_cuenta_prestada').show("slow");
            }
        });

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
            var nombre = $('#nombre').val();
            var apellido = $('#apellido').val();
            var documento_tipo = $('#documento_tipo').val();
            var documento_numero = $('#documento_numero').val();
            var telefono = $('#telefono').val();
            var email = $('#email').val();
            var _token = $('input[name=_token]').val();
            var id = {{$id_modelo}};

            e.preventDefault();
            Swal.fire({
                title: '¿Estas seguro?',
                text: "Recuerda que tu clave es tu numero de documento",
                icon: 'warning',
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Deseo Modificar mis datos',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        type: 'PUT',
                        url: "{{route('modelos.update')}}",
                        dataType: "JSON",
                        data: {
                            'id': id,
                            'nombre': nombre,
                            'apellido': apellido,
                            'documento_tipo': documento_tipo,
                            'documento_numero': documento_numero,
                            'telefono': telefono,
                            'email': email,
                            '_token': _token,
                        },

                        beforeSend: function(){
                            $('#submit1').prop('disabled', true);
                        },
                        
                        success: function(respuesta){
                            console.log(respuesta);
                            if(respuesta["estatus"]=="error"){
                                $('#submit1').prop('disabled', false);
                                Swal.fire({
                                    title: 'Error',
                                    text: respuesta["msg"],
                                    icon: 'error',
                                    showConfirmButton: true,
                                });
                                return false;
                            }
                            window.location = "{{url()->current()}}";
                        },

                        error: function(respuesta){
                            $('#submit1').prop('disabled', false);
                            console.log(respuesta['responseText']);
                        }
                    });
                }
            });
        });

    </script>

@endsection
