@extends('layouts.app')
@section('title1', 'Envio de Comprobantes')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('entradas/')}}">
        <button class="btn  btn-sm btn-primary">Entradas</button>
    </a>
</div>
@endsection
@section('title2', 'Envío de Comprobantes de Venta')
@section('contenido')
@if(Session::has('estatus'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="text-success">{{Session::get('estatus')}}</p>
</div>
@endif
<form action="{{url('clientes/send_comprobante')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table>
        <tr>
            <th>Cliente:</th>
            <td>
                <input class="form-control" list="datalistOptions" id="idcliente">
                <datalist id="datalistOptions">
                    <option value="">Elige Un Cliente</option>
                    @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">{{$cliente->cliente}}
                    </option>
                    @endforeach
                </datalist>
            </td>
            <td>
                <input type="text" name="" id="cliente" class="form-control">
            </td>
        </tr>
        <tr>
            <th>Correo:</th>
            <td colspan="2">
                <input type="email" name="email" id="email" class="form-control">
            </td>
        </tr>
        <tr>
            <th>Asunto:</th>
            <td colspan="2">
                <input type="text" name="asunto" id="" class="form-control ">
            </td>
        </tr>
        <tr>
            <th>Archivo: </th>
            <td colspan="2">
                <input type="file" name="archivo" id="" class="form-control">
            </td>
        </tr>
        <tr>
            <th>Mensaje:</th>
            <td colspan="2">
                <textarea name="mensaje" class="form-control" id="" cols="30" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Enviar Correo" class="btn btn-info">
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $('#idcliente').on('change', function () {
            var id_cliente = $("#idcliente").val();
            //console.log(proveedor);
            if ($.trim(id_cliente) != '0') {
                $.get('datos02', {
                    id_cliente: id_cliente
                }, function (id_cliente) {
                    $('#cliente').append( "<option value='0'>--Selecciona Un Cliente--</option>");
                    $.each(id_cliente, function (id, cliente) {
                        $('#cliente').val(cliente);
                    });
                })
            }
        });
        $('#idcliente').on('change', function () {
            var id_cliente = $("#idcliente").val();
            //console.log(proveedor);
            if ($.trim(id_cliente) != '0') {
                $.get('datos03', {
                    id_cliente: id_cliente
                }, function (id_cliente) {
                    $('#cliente').append( "<option value='0'>--Selecciona Un Cliente--</option>");
                    $.each(id_cliente, function (id, email) {
                        $('#email').val(email);
                    });
                })
            }
        });
    });
</script>
@endsection