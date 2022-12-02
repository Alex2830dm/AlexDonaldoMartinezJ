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
            var valcliente = /^[A-Za-z0-9\_\-.\s\xF1\xD1]+$/;
            if (valcliente.test(txtcliente)) {
                $("#cliente").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#cliente").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
        $("#representante").keyup(function () {
            var txtrepresentante = $("#representante").val();
            var valrepresentante = /^[A-Za-z\_\-.\s\xF1\xD1]+$/;
            if (valrepresentante.test(txtrepresentante)) {
                $("#representante").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
            } else {
                $("#representante").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
            }
        });
        $("#telefono").keyup(function () {
            var txttelefono = $("#telefono").val();
            var valtelefono = /[0-9]/g;
            if (valtelefono.test(txttelefono)) {
                if (txttelefono.length > 12) {
                    $("#telefono").css({
                        "border": "1px solid #D30114"
                    }).fadeIn(2000);
                } else {
                    $("#telefono").css({
                        "border": "1px solid #01D30B"
                    }).fadeIn(2000);
                }
            } else {
                $("#telefono").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
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
<form action="{{url('clientes/update/'.$detalle->id)}}" method="post">
    {{csrf_field()}} {{method_field('PATCH')}}
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <input class="form-control" type="text" name="cliente" id="cliente" value="{{$detalle->cliente}}">
                @error('cliente')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="representante">Representante</label>
                <input class="form-control" type="text" name="representante" id="representante" value="{{$detalle->representante}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="telefono">No. Teléfono</label>
                <input class="form-control" type="text" name="telefono" id="telefono" value="{{$detalle->telefono}}">
                @error('telefono')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="ruta">Ruta</label>
                <select name="ruta" id="" class="form-select">
                    {{-- <option value="#"> -- Selecciona un Ruta --</option>
                    @foreach ($rutas as $ruta)
                    <option value="{{$ruta->id}}">{{$ruta->ruta}}</option>
                    @endforeach --}}
                    @foreach ($rutas as $ruta)
                    @if($detalle->ruta == $ruta->id)
                        <option value="{{$ruta->id}}">{{$ruta->ruta}}</option>
                    @endif
                @endforeach
                @foreach ($rutas as $ruta)
                    @if($detalle->ruta != $ruta->id)
                    <option value="{{$ruta->id}}">{{$ruta->ruta}}</option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <h5>Datos del Domicilio del Cliente</h5>
        <div class="col-4">
            Calle y Número:
            <input type="text" name="d_calle" class="form-control" id="calle" value="{{$detalle->d_calle}}">
            @error('d_calle')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-4">
            Colonia:
            <input type="text" name="d_colonia" class="form-control" id="colonia" value="{{$detalle->d_colonia}}">
            @error('d_colonia')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-4">
            Municipio:
            <input type="text" name="d_municipio" class="form-control" id="municipio" value="{{$detalle->d_municipio}}">
            @error('d_municipio')
            <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            Referencia:
            <textarea name="d_referencia" class="form-control" id="" cols="20" rows="2" id="referencia" value="{{$detalle->d_referencia}}"></textarea>
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
