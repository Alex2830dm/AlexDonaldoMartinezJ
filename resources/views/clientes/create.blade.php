@extends('layouts.app')
@section('title1', 'Nuevo Cliente')
@section('opciones')
<div class="header_toggle">
    <button id="mostrar" class="btn btn-sm btn-primary">Registrar Nueva Ruta</button>
</div>
@endsection
@section('title2', 'Registrar Nuevo Cliente')
@section('contenido')
<script type="text/javascript">
    $(document).ready(function () {
        $("#cliente").keyup(function () {
            var txtcliente = $("#cliente").val();
            var valcliente = /^[A-Za-z0-9 áéíóú\_\-.\s\xF1\xD1]+$/;
            if (valcliente.test(txtcliente)) {
                $("#cliente").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
                $("#errorCli").val("Error solo se adminten letras, números y '. - _'");
            } else {
                $("#cliente").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $("#errorCli").val("Correcto !!");
            }
        });
        $("#representante").keyup(function () {
            var txtrepresentante = $("#representante").val();
            var valrepresentante = /^[A-Za-z áéíóú .\s\xF1\xD1]+$/;
            if (valrepresentante.test(txtrepresentante)) {
                $("#representante").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
                $("#errorRep").val("Error: Solo de admiten letras");
            } else {
                $("#representante").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $("#errorRep").val("Correcto !!");
            }
        });
        $("#telefono").keyup(function () {
            var txttelefono = $("#telefono").val();
            var valtelefono = /[0-9]/g;
            if (valtelefono.test(txttelefono)) {
                if (txttelefono.length >= 12) {
                    $("#telefono").css({
                        "border": "1px solid #D30114"
                    }).fadeIn(2000);
                    $("#errorTel").val("Error: Solo de admiten 12 digitos");
                } else {
                    $("#telefono").css({
                        "border": "1px solid #01D30B"
                    }).fadeIn(2000);
                }
            } else {
                $("#telefono").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $("#errorTel").val("Correcto !!");
            }
        });
        $("#calle").keyup(function () {
            var txtcalle = $("#calle").val();
            var valcalle = /^[A-Za-z0-9\_\-.\s\xF1\xD1]+$/;
            if (valcalle.test(txtcalle)) {
                $("#calle").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#calle").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
        $("#colonia").keyup(function () {
            var txtcolonia = $("#colonia").val();
            var valcolonia = /^[A-Za-z0-9\_\-.\s\xF1\xD1]+$/;
            if (valcolonia.test(txtcolonia)) {
                $("#colonia").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#colonia").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
        $("#municipio").keyup(function () {
            var txtmunicipio = $("#municipio").val();
            var valmunicipio = /^[A-Za-z0-9\_\-.\s\xF1\xD1]+$/;
            if (valmunicipio.test(txtmunicipio)) {
                $("#municipio").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#municipio").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
        $("#referencia").keyup(function () {
            var txtreferencia = $("#referencia").val();
            var valreferencia = /^[A-Za-z0-9\_\-.\s\xF1\xD1]+$/;
            if (valreferencia.test(txtreferencia)) {
                $("#referencia").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#referencia").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
    });

</script>
<div id="registro" style="border:1px solid #337DF8;" class="row">
    <form action="{{url('clientes/salvarR')}}" method="POST">
        @csrf
        <div class="col-10">
            Ruta: <input type="text" name="ruta" class="form-control form-control-sm">
        </div>
        <div class="col-2">
            <input type="submit" value="Enviar Datos" class="btn btn-success btn-sm">
        </div>
    </form>
</div>
<form action="{{url('clientes/guardar')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input class="form-control" type="text" name="cliente" id="cliente">
                @foreach ($folio as $folio)
                    <input type="hidden"name="codigo" value="{{$folio->folio + 1}}" readonly>
                @endforeach 
                @error('cliente')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <span id="errorCli"></span>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="representante">Representante</label>
                <input class="form-control" type="text" name="representante" id="representante">
                <span id="errorRep"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="telefono">No. Teléfono</label>
                <input class="form-control" type="text" name="telefono" id="telefono">
                @error('telefono')
                <p class="error-message">{{ $message }}</p>
                @enderror
                <span id="errorTel"></span>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="email">Correo Electronico:</label>
                <input class="form-control" type="email" name="email" id="email">
                @error('email')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label for="ruta">Ruta</label>
                <select name="ruta" id="" class="form-control">
                    <option value="#"> -- Selecciona un Ruta --</option>
                    @foreach ($rutas as $ruta)
                    <option value="{{$ruta->id}}">{{$ruta->ruta}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
    <h5>Datos del Domicilio del Cliente</h5>
    <div class="row">        
        <div class="col-4">
            Calle y Número:
            <input type="text" name="d_calle" class="form-control" id="calle">
            @error('d_calle')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-4">
            Colonia:
            <input type="text" name="d_colonia" class="form-control" id="colonia">
            @error('d_colonia')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-4">
            Municipio:
            <input type="text" name="d_municipio" class="form-control" id="municipio">
            @error('d_municipio')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            Referencia:
            <textarea name="d_referencia" class="form-control" id="" cols="20" rows="2" id="referencia"></textarea>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="">Guardar</label>
                <button type="submit" class="btn btn-success">Guardar Nuevo Cliente</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $("#registro").hide();
        $("#mostrar").on("click", function () {
            $('#registro').show(); //muestro mediante id			
        });
    });

</script>
@endsection
