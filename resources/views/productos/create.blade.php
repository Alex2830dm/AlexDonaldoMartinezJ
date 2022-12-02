@extends('layouts.app')
@section('title1', 'Nuevo Producto')
@section('title2', 'Nuevo Producto')
{{-- @section('opciones')
<div class="header_toggle"> 
    <button id="mostrar" class="btn btn-sm btn-primary">Registrar Unidad</button>
</div>
@endsection --}}
@section('contenido')
<script type="text/javascript">
    $(document).ready(function () {
        $("#producto").keyup(function () {
            var txtproducto = $("#producto").val();
            var valproducto = /^[A-Za-z0-9\_\-.\s\xF1\xD1]+$/;
            if (valproducto.test(txtproducto)) {
                $("#producto").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
                $('#errorP').text('Correcto!!');
            } else {
                $("#producto").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $('#errorP').text('Error: Solo se adminten mayusculas minusculas y ". _ - /"');
            }
        });
        $("#descripcion").keyup(function () {
            var txtdescripcion= $("#descripcion").val();
            var valdescripcion = /^[A-Za-z0-9.,#,_,-,(,),=,*,^,/*\_\-.\s\xF1\xD1]+$/;
            if (valdescripcion.test(txtdescripcion)) {
                $("#descripcion").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
                $('#errorD').text('Correcto!!');
            } else {
                $("#descripcion").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $('#errorD').text('Error: No cumple con las reglas');
            }
        });
        $("#unidad").change(function (){
            var valunidad = $("#unidad").val();
            if(valunidad == ""){
                $("#unidad").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $('#errorU').text('Error: debes seleccionar una opción');
            } else {
                $("#unidad").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
                $('#errorU').text('Correcto!!');
            }
        });
        $("#tipo").change(function (){
            var valtipo = $("#tipo").val();
            if(valtipo == ""){
                $("#tipo").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $('#errorT').text('Error: debes seleccionar una opción');
            } else {
                $("#tipo").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
                $('#errorT').text('Correcto!!');
            }
        });
        $("#precio").keyup(function () {
            var txtprecio = $("#precio").val();
            var valprecio = /[0-9]/i;
            //var valprecio = /^[0-9].[0-9]$/i;
            if (valprecio.test(txtprecio)) {
                $("#precio").css({
                    "border": "1px solid #31D301"
                }).fadeIn(2000);
                $('#errorC').text('Correcto!!');
            } else {
                $("#precio").css({
                    "border": "1px solid #D30114"
                }).fadeIn(2000);
                $('#errorC').text('Error: solo admite números');
            }
        });        
    });

</script>
<div id="registro" style="border:1px solid #337DF8;" class="row">
    <form action="{{route('datos04')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        Registrar Nueva Unidad
        <table>
            <tr>
                <td>Unidad</td>
                <td><input type="text" name="nombre" id="" class="form-control form-control-sm"></td>
                <td>Categoria</td>
                <td>
                    <input type="hidden" name="categoria" value="2">
                    <input type="text" class="form-control form-control-sm" readonly value="Productos">
                </td>
                <td><input type="submit" value="Guardar" class="btn btn-success btn-sm"></td>
            </tr>
            <br>
        </table>
    </form>
</div>
<form action="{{url('productos/guardar')}}" method="post" enctype="multipart/form-data">
    <div class="row">
        @csrf
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="producto">Producto</label>
                <input class="form-control" type="text" name="producto" id="producto">
                @error('producto')                
                <div class="alert alert-danger" role="alert">
                    Este Campo Es Obligatorio
                </div>
                @enderror
                <span id="errorP"></span>
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <label for="unidad">Unidad</label>
                <select name="unidad" class="form-control" id="unidad">
                    <option value=""> -- Selecciona una Unidad -- </option>
                    <option value="Piezas">Piezas</option>
                    <option value="Cajas">Cajas</option>
                </select>
                <span id="errorU"></span>
            </div>
        </div>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <label for="tipo">Categoria de Producto</label>
                <select name="tipo" class="form-control" id="tipo">
                    <option value=""> -- Selecciona la Categoria -- </option>
                    <option value="Producido">Producido</option>
                    <option value="Comprado">Comprado</option>
                </select>
                <span id="errorT"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input class="form-control" type="text" id="descripcion" name="descripcion">
                @error('descripcion')
                <div class="alert alert-danger" role="alert">
                    Este Campo Es Obligatorio
                </div>
                @enderror
                <span id="errorD"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="precio">Precio</label>
                <input class="form-control" type="text" id="precio" name="precio">
                @error('precio')
                <div class="alert alert-danger" role="alert">
                    Este Campo Es Obligatorio
                </div>
                @enderror
                <span id="errorC"></span>
            </div>
        </div>
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="foto">Foto del Producto</label>
                <input class="form-control" type="file" name="foto">
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
            <div class="form-group">
                <label for="">Guardar</label>
                <button type="submit" class="btn btn-success">Guardar Producto</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $("#registro").hide();
            $("#mostrar").on( "click", function() {
                $('#registro').show(); //muestro mediante id			
             });
        });
</script>
@endsection
