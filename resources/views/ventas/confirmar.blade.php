@extends('layouts.app')
@section('title1', 'Ventas')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('ventas/')}}">
        <button class="btn  btn-sm btn-primary">Ventas</button>
    </a>
</div>
@endsection
@section('title2', 'Detalles de Venta')
@section('contenido')
<form action="{{url('preventas/update')}}" method="post">
    {{-- @method('PUT') --}}
    @csrf
    @foreach ($cliente as $cliente)
    <div class="row">
        <div class="col-2">
            <label for="">ID Cliente</label>
            <input type="text" class="form-control form-control-sm" value="{{$cliente->id}}">
        </div>
        <div class="col-5">
            <label for="">Cliente:</label>
            <input type="text" class="form-control form-control-sm" value="{{$cliente->cliente}}">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="">ID Venta</label>
            <input type="text" name="id_venta" class="form-control form-control-sm" value="{{$cliente->idv}}">
        </div>
        <div class="col-5">
            <label for="">Código de Venta</label>
            <input type="text" name="codigo" class="form-control form-control-sm" value="{{$cliente->codigo}}">
        </div>
        <div class="col-5">
            <label for="">Fecha y Hora de Venta</label>
            <input type="text" class="form-control form-control-sm" value="{{$cliente->created_at}}">
        </div>
    </div>
    @endforeach
    <table class="table">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total por producto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $ventas)
                <tr>
                    <td><input type="text" name="id_producto[]" id="" class="form-control form-control-sm"
                            value="{{$ventas->id}}" readonly></td>
                    <td><input type="text" class="form-control form-control-sm" value="{{$ventas->descripcion}}"
                            readonly>
                    </td>
                    <td><input type="text" name="cantidad[]" id="" class="form-control form-control-sm"
                            value="{{$ventas->cantidad}}" readonly></td>
                    <td><input type="text" class="form-control form-control-sm" value="{{$ventas->precio}}" readonly>
                    </td>
                    <td><input type="text" class="form-control form-control-sm" value="{{$ventas->costo}}" readonly>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td>Subtotal</td>
                    <td>$ {{$total->subtotal}} MXN</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td>Total de descuento</td>
                    <td>$ {{$total->descuento}} MXN</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Impuestos:</td>
                    <td>% {{$total->impuestos}} </td>
                    <td>Total: </td>
                    <td>$ {{$total->total}} MXN</td>
                </tr>
                @if($total->tipo_pago == 0)
                    <tr>
                        <td colspan="2"></td>
                        <td>Metodo de Pagó</td>
                        <td><input type="radio" name="tipo_pago" id="" value="1"> Efectivo</td>
                        <td><input type="radio" name="tipo_pago" id="" value="2"> PayPal</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </table>
    <div class="row">
        <div class="col-2">
            <input type="submit" value="Confirmar Venta" class="btn btn-success">
        </div>
    </div>
</form>
@endsection
