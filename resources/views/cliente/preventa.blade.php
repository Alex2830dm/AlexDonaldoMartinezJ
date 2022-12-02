@extends('layouts.indexCli')
@section('titulo1', 'Nueva Preventa')
@section('contenido')
@if(Session::has('estatus'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="text-success">{{Session::get('estatus')}}</p>
</div>
@endif
<form action="{{url('preventas/store')}}" method="post">
    @csrf
    {{-- <input type="hidden" name="id_encargado" class="form-control" value="{{auth()->user()->id}}"> --}}
    <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                @foreach ($folio as $folio)
                    <label for="">Código de Venta</label>
                    <input type="text" id="codigo" name="codigo" value="{{$folio->folio + 1}}" class="form-control"
                        readonly>
                @endforeach 
            </div>
        </div>
        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
            <div class="form-group">
                <label for="">Cliente / Representante: </label>
                <input type="hidden" name="id_cliente" value="{{auth()->user()->codigo}}" class="form-control" readonly>
                <input type="hidden" name="id_encargado" value="0" class="form-control" readonly>
                <input type="text"  value="{{auth()->user()->name}}" class="form-control" readonly>
            </div>
        </div>
    </div>
    <br>
    <div class="row" id="foto_producto">
    </div>
    <br>
    <div class="row">        
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <div class="form-group">
                <label>Producto: </label>
                <input class="form-control" list="datalistProductos" id="id_producto">
                <datalist id="datalistProductos">
                    <option value="">-- Seleccione un Producto --</option>
                    @foreach ($productos as $producto)
                        <option value="{{$producto->id}}">{{$producto->descripcion}} - {{$producto->unidad}} </option>
                    @endforeach
                </datalist>
            </div>
        </div>
    </div>
        <div id="info01"></div>
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <div class="form-group">
            <button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
        </div>
    </div>
    <br>
    <div class="row">
        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
            <thead style="background-color: #A9D0F5">
                <th>Opciones</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Importe</th>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="2"></th>
                    <th>Subtotal</th>
                    <th>
                        <div class="input-group">
                            <input type="hidden" class="form-control-sm" name="subtotal"
                                id="subtotal1">
                            <div id="subtotal2"></div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th>Impuestos (16%):</th>
                    <th>
                        <div class="input-group">
                            <input type="hidden" class="form-control-sm" name="impuestos"
                                id="" value="16">
                            <div id="impuestos"></div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th>Total Aprox.</th>
                    <th>
                        <div class="input-group">
                            <input type="hidden" class="form-control-sm" placeholder="00.00" name="total" id="total1">
                            <div id="total2"></div>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td></td>
                    <td>Metodo de Pagó</td>
                    <td>
                        <input type="radio" name="tipo_pago" id="tipo_pago1" value="1"> Efectivo
                        <b class="text-warning" id="msj_Efectivo"></b>
                    </td>                    
                    <td>
                        <input type="radio" name="tipo_pago" id="tipo_pago2" value="2"> PayPal
                        <b class="text-warning" id="msj_Paypal"></b>
                    </td>
                </tr>
            </tfoot>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="submit" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function () {
        //--------------------------------------------------
        $("#tipo_pago1").change( function(){
            var tipo_pago = $("#tipo_pago1").val();
            if(tipo_pago == 1){
                $("#msj_Paypal").html("");
                $("#msj_Efectivo").html("El persoanl cobrará el día de entrega!!");
            }
        })
        $("#tipo_pago2").change( function(){
            var tipo_pago = $("#tipo_pago2").val();
            if(tipo_pago == 2){
                $("#msj_Efectivo").html("");
                $("#msj_Paypal").html("Recuerde el Folio de Preventa, se ocupará más tarde !!");
            }
        })
        //--------------------------------------------------
        $("#id_producto").change(function () {
            var producto = $("#id_producto").val();
            //alert(materia);
            if (producto == 0) {
                $("#foto_producto").empty();
            } else {
                $("#foto_producto").load("{{ route('datos03') }}?id=" + producto);
            }
        });
        $("#id_producto").change(function () {
            var producto = $("#id_producto").val();
            //alert(materia);
            if (producto == 0) {
                $("#info01").empty();
                $("#info02").empty();
            } else {
                $("#info01").load("{{ route('datos02') }}?id=" + producto);
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
        $('#bt_add').click(function () {
            agregar();
        });
    });
    var cont = 0;
    total1 = 0;
    totaldesc = 0;
    subtotal = [];
    subdesc = []

    function limpiar() {
        $("#pcantidad").val("");
        $("#pprecio").val("");
        $("#ptotal").val("");
        $("id_producto").empty();
    }

    function evaluar() {
        if (total1 > 0) {
            $("#guardar").show()
        } else {
            $("#guardar").hide()
        }
    }

    function eliminar(index) {
        total1 = total1 - subtotal[index];
        $("#total").html(total1);
        $("#fila" + index).remove();
        evaluar();
    }

    function agregar() {
        id_producto = $('#id_producto').val();
        producto = $('#pproducto').val();
        cantidad = $('#pcantidad').val();
        precio = $('#pprecio').val();
        costo = $('#pcosto').val();
        if (id_producto != "" && cantidad != "" && cantidad > 0) {
            subtotal[cont] = (cantidad * precio);
            total1 = total1+ subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont +
                '"> <td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
                ');">X</button></td><td><input type="hidden" readonly name="cantidad[]" value="' + cantidad +
                '">'+ cantidad +'</td> <td><input type="hidden" name="id_producto[]" value="' + id_producto + '">' + 
                producto + '</td><td><input type="hidden" name="importe[]" readonly value="' + subtotal[cont] + '">'+ subtotal[cont] +'</td></tr>';
            cont++;
            limpiar();
            $("#subtotal1").val(total1);
            $("#subtotal2").text(total1);
            var impuestos = (parseFloat(total1) * 16)/100;
            var total = total1 + impuestos;
            $("#impuestos").text(impuestos);
            $("#total1").val(total);
            $("#total2").text(total);
            $("#subdesc").val(totaldesc);
            evaluar();
            $("#detalles").append(fila);
        } else {
            alert('Error al ingresar el detalle del ingreso, revise los datos del producto');
        }
    }

</script>
@endsection
