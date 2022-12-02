@extends('layouts.app')
@section('paypal')
{{-- <script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}"></script> --}}
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_LIVE_CLIENT_ID')}}"></script>
@endsection
@section('title1', 'Ventas de Productos')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('ventas/')}}">
        <button class="btn  btn-sm btn-primary">Ventas</button>
    </a>
</div>
<div class="header_toggle">
    <a href="{{url('ventas/imprimir/'.$venta->codigo)}}">
        <button class="btn  btn-sm btn-danger">Descargar Comprobante</button>
    </a>
</div>
@endsection
@section('title2', 'Detalles de Venta')
@section('contenido')
<div class="container">
@if(Session::has('status'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="text-success">{{Session::get('status')}}</p>
</div>
@endif
    <table class="table">
        <tbody>
            <tr>
                <td rowspan="7">
                    <img src="{{asset('img/logo_frefrigel.jpg')}}" width="200">
                </td>
            </tr>
            <tr>
                <td><b>Código de Venta: </b>{{$venta->codigo}}</td>
            </tr>
            <tr>
                <td><b>Total de Venta:</b> $ {{$venta->subtotal}}</td>
            </tr>
            <tr>
                <td><b>Total de descuento (% {{$venta->porcentaje_descuento}}):</b> {{$venta->descuento}}</td>
            </tr>
            <tr>
                <td><b>IVA %: </b> {{$venta->impuestos}}</td>
            </tr>
            <tr>
                <td><b>Fecha de Compra: </b>{{$venta->created_at}}</td>
            </tr>
            @if($venta->tipo_pago == 2)
                <tr>
                    <td>
                        {{-- <form action="{{url('/paypal/pay')}}" method="get">
                            <input type="hidden" name="total" value="{{$venta->total}}">
                            <input type="submit" value="Pagar con PayPal" class="btn btn-outline-primary">
                        </form> --}}
                        <a class="btn btn-outline-primary" href="{{route('processPaypal')}}">Pagar Con PayPal</a>
                    </td>
                </tr>
            @else
                <tr>
                    <td>
                        Pago en Efectivo
                    </td>
                </tr>
            @endif
        </tbody>
    </table>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad Vendida</th>
                <th scope="col">Importe</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalle as $detalle)
            <tr>
                <td>{{$detalle->idc}}</td>
                <td>{{$detalle->producto}}</td>
                <td>{{$detalle->cantidad}} {{$detalle->unidad}}</td>
                <td>$ {{$detalle->importe}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
