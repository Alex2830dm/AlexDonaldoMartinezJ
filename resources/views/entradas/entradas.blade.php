@extends('layouts.app')
@section('title1', 'Entradas de Productos')
@section('title2', 'Entradas de Productos')
@section('contenido')
<form action="{{url('entradas/store')}}" method="post">
    @csrf
    {{-- <input type="hidden" class="form-control" value="{{csrf_token()}}" readonly> --}}
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Folio de Entrada</label>
                @foreach ($folio as $folio)
                <input type="text" id="codigo" name="codigo" value="{{$folio->folio + 1}}" class="form-control"
                readonly>
                @endforeach 
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Encargado de la entrada: </label>
                <input type="hidden" name="id_encargado" value="{{auth()->user()->id}}" readonly>
                <input type="text" class="form-control" value="{{auth()->user()->name}}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label>Productos: </label>
            <input class="form-control" list="datalistOptions" id="pproducto">
            <datalist id="datalistOptions">
                <option value="">Elige Un Producto</option>
                @foreach ($productos as $producto)
                <option value="{{$producto->id}}">{{$producto->descripcion}} - {{$producto->unidad}}</option>
                @endforeach                
              </datalist>
        </div>
    </div>
    <div id="info01"></div>
    <br>
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                <thead style="background-color: #A9D0F5">
                    <th>Opciones</th>
                    <th>Clave</th>
                    <th>Cantidad</th>
                    <th>Unidad</th>                
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary">Guardar</button>
            <a href="{{url('entradas')}}" class="btn btn-outline-danger">Cancelar y Regresar</a>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $("#pproducto").change(function () {
            var producto = $("#pproducto").val();
            //alert(alumno);
            if (producto == 0) {
                $("#info01").empty();                
            } else {
                $("#info01").load("{{ route('datos_entradas') }}?id=" + producto);
            }
        });
        //------------------------------------------------------------
        $('#bt_add').click(function () {
            agregar();
        });
    });
    var cont = 0;
    total = 0;
    subtotal = [];

    function limpiar() {
        $("#pcantidad").val("");
        $("#pprecio").val("");
        $("#ptotal").val("");
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show()
        } else {
            $("#guardar").hide()
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        $("#total").html(total);
        $("#fila" + index).remove();
        evaluar();
    }

    function agregar() {
        id_producto = $('#pproducto').val();
        producto = $('#producto').val();
        unidad = $('#punidad').val();
        cantidad = $('#pcantidad').val();
        if (id_producto != "" && cantidad != "" && cantidad > 0) {
            var fila = '<tr class="selected" id="fila' + cont +
            '"> <td><button type="button" class="btn btn-warning" onclick="eliminar(' + cont +
            ');">X</button></td> <td><input type="hidden" name="id_producto[]" value="' + id_producto + '">' +
                    producto + '</td> <td><input type="number" readonly name="cantidad[]" value="' + cantidad +
                '"></td> <td><input type="text" readonly value="' + unidad + '"></td></tr>';
            cont++;
            limpiar();
            $("#total").val(total);
            evaluar();
            $("#detalles").append(fila);
            $("#info01").empty();
            $("#pproducto").val(0);
        } else {
            alert('Error al ingresar el detalle del ingreso, revise los datos del producto');
        }
    }

</script>
@endsection
