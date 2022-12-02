<?php
    $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
    $cad = "";
    for ($i=0; $i < 5; $i++) { 
        $cad .= substr($charset, rand(0, 61), 1);
    }
?>
@extends('layouts.app')
@section('title1', 'Ventas')
@section('title2', 'Nueva Venta')
@section('contenido')
@if(Session::has('status'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="text-success">{{Session::get('status')}}</p>
</div>
@endif
<form action="{{url('ventas/store')}}" method="post">
    @csrf
    <input type="hidden" name="id_encargado" class="form-control" value="1">
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label for="">Folio de Venta</label>
                @foreach ($folio as $folio)
                <input type="text" id="codigo" name="codigo" value="{{$folio->folio + 1}}" class="form-control"
                readonly>
                @endforeach 
            </div>
        </div>
        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
            <div class="form-group">
                <label for="">Cliente: </label>
                <input class="form-control" list="datalistClientes" id="id_cliente" name="id_cliente">
                <datalist id="datalistClientes">
                    <option value="">Selecciona un cliente</option>
                    @foreach ($clientes as $clientes)
                    <option value="{{$clientes->id}}"> {{$clientes->cliente}}</option>
                    @endforeach
                </datalist>
                @error('id_cliente')
                    <p class="error-message text-danger">Se requiere seleccionar un cliente</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="row" id="info_cliente">
        
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Producto: </label>
                <input class="form-control" list="datalistProductos" id="id_producto">
                <datalist id="datalistProductos">
                    <option value="">Elige Un Producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{$producto->id}}">{{$producto->descripcion}} - {{$producto->unidad}} </option>
                    @endforeach
                </datalist>
            </div>
        </div>
    </div>
    <div id="info01"></div>
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
            </div>
        </div>
    </div>
    <div class="row">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
                <th>Opciones</th>
                <th>Clave</th>
                <th>Cantidad</th>                
                <th>% Desc.</th>
                <th>Importe</th>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="3"></th>
                    <th>Subtotal</th>
                    <th>
                        <div class="input-group">
                            <input type="text" class="form-control-sm" placeholder="00.00" name="subtotal"
                                id="subtotal" readonly>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="3"></th>                    
                    <th>Descuento Total:</th>
                    <th>
                        <div class="input-group">
                            <input type="text" class="form-control-sm" name="subdesc" id="desctotal" readonly>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th></th>
                    <th>Impuestos</th>
                    <th>
                        <div class="input-group">
                            <input type="number" class="form-control-sm" name="impuestos" value="0" id="impuestos">                            
                        </div>
                        <div class="text-secondary">Ingresar el % de impuestos</div>

                        @error('impuestos')
                            <p class="error-message text-danger">Se requiere ingresar el % de impuestos.</p>
                        @enderror
                    </th>
                    <th>Total</th>
                    <th>
                        <div class="input-group">
                            <input type="text" class="form-control-sm" placeholder="00.00" name="total" id="total" readonly>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Metodo de Pagó</td>
                    <td><input type="radio" name="tipo_pago" id="" value="1"> Efectivo</td>
                    <td><input type="radio" name="tipo_pago" id="" value="2"> PayPal</td>
                </tr>
            </tfoot>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                <a href="{{url('ventas')}}" class="btn btn-outline-danger">Cancelar y Regresar</a>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        $("#id_cliente").change(function () {
            var cliente = $("#id_cliente").val();
            //alert(materia);
            if (cliente == 0) {
                $("#info_cliente").empty();
            } else {
                $("#info_cliente").load("{{ route('datos04') }}?id_cliente=" + cliente).css({"background":"#A9D0F5"});;
            }
        });
        //---------------------------------------------------------------
        $("#id_producto").change(function () {
            var producto = $("#id_producto").val();
            //alert(materia);
            if (producto == 0) {
                $("#info01").empty();
                $("#info02").empty();
            } else {
                $("#info01").load("{{ route('datos01') }}?id=" + producto);
            }
        });
        //------------------------------------------------------------
        $("#pcantidad").keyup(function () {
            var cantidad = $("#pcantidad").val();
            var precio = $("#pprecio").val();
            var subtotal = parseFloat(cantidad) * parseFloat(precio);
            $("#pcosto").val(subtotal);
        });
        //------------------------------------------------------------
        $("#impuestos").keyup(function () {
            var subtotal = $("#subtotal").val();
            var iva = $("#impuestos").val();
            var total = parseFloat(((iva * subtotal) / 100)) + parseFloat(subtotal);
            var redondeo = total.toFixed(2);
            $("#total").val(redondeo);
        });
        //------------------------------------------------------------
        $('#bt_add').click(function () {
            agregar();
        });
    });
    var cont = 0;
    subtotal = 0;
    descuentos = 0;
    importes = [];
    subt = [];
    porcdesc = [];

    function limpiar() {
        $("#cantidad").val("");
        $("#precio").val("");
        $("#total").val("");
        $("id_producto").empty();
    }

    function evaluar() {
        if (subtotal > 0) {
            $("#guardar").show()
        } else {
            $("#guardar").hide()
        }
    }

    function eliminar(index) {
        subtotal = subtotal - importes[index];
        $("#subtotal").val(subtotal);
        $("#fila" + index).remove();
        evaluar();
    }

    function agregar() {
        id_producto = $('#id_producto').val();
        producto = $('#producto').val();
        cantidad = $('#cantidad').val();
        precio = $('#precio').val();
        importe = $('#importe').val();
        descuento = $("#descuento2").val();
        porcentaje = $("#descuento1").val();
        if (id_producto != "" && cantidad != "" && cantidad > 0 && precio != "" && importe != "") {
            subt[cont] = (cantidad * precio); //de cada producto, multiplica la cantidad por su precio
            importes[cont] = subt[cont] - parseFloat(descuento); //del subtotal le resta es descuento
            subtotal = subtotal + importes[cont]; // suma todos los importes de la venta
            descuentos = parseFloat(descuentos) + parseFloat(descuento); //suma el descuento de cada producto
            var fila = '<tr class="selected" id="fila' + 
                cont +'"> <td> <button type="button" class="btn btn-warning" onclick="eliminar(' + 
                cont + ');">X</button></td> <td><input type="hidden" name="id_producto[]" value="' + 
                id_producto + '">' + producto + '</td> <td><input type="number" name="cantidad[]" value="' + 
                cantidad + '"></td> <td><input type="number" name="descuento[]" value="' + 
                porcentaje + '"></td> <td><input type="number" name="importe[]" value="' + importe + '"></td></tr>';
            cont++;
            limpiar();
            $("#subtotal").val(subtotal);
            $("#desctotal").val(descuentos);
            evaluar();
            $("#detalles").append(fila);
            $("#info01").empty();
            $("#id_producto").val(0);
        } else {
            alert('Error al ingresar el detalle del ingreso, revise los datos del producto');
        }
    }

</script>
@endsection
