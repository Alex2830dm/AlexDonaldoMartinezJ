@extends('layouts.app')
@section('title1', 'Ventas')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('preventas/nueva')}}">
        <button class="btn  btn-sm btn-primary">Nueva Preventa</button>
    </a>
</div>
<div class="header_toggle">
    <a href="{{url('ventas/nueva')}}">
        <button class="btn  btn-sm btn-primary">Nueva Venta</button>
    </a>
</div>
@endsection
@section('title2', 'Listado de Preventas / Ventas')
@section('contenido')
@if(Session::has('estatus'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="text-success">{{Session::get('estatus')}}</p>
</div>
@endif
@if(session('status'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{session('status')}}
</div>
@endif
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código de Venta</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
                <th scope="col">Tipo</th>
                <th scope="col">Tipo de Pago</th>
                <th scope="col">Estatus Pago</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
            <tr>
                <td>{{$venta->id}}</td>
                <td>{{$venta->codigo}}</td>
                <td>{{$venta->cliente}}</td>
                <td> $ {{$venta->total}} MXN</td>
                <td>{{$venta->tipo}}</td>
                {{-- If para identificar el tipo de pago --}}
                @if($venta->tipo_pago == 0)
                    <td class="text-danger">Sin Pago</td>
                @elseif($venta->tipo_pago == 1)
                    <td class="text-warning">Efectivo</td>
                @else
                    <td class="text-info">PayPal</td>
                @endif

                <td> {{$venta->estatus_pago}} </td>
                <td>
                    @if($venta->estatus_pago == "Pendiente")
                        @if($venta->tipo_pago == 1)
                            <a href="{{url('ventas/pagar/'.$venta->id)}}" class="btn btn-outline-success btn-sm">Confirmar Pago</a>
                        @elseif($venta->tipo_pago == 2)
                            <a href="{{route('processPaypal')}}" class="btn btn-outline-primary btn-sm">Pagar Con PayPal</a>
                        @endif
                    @endif
                    <a href="{{url('ventas/show/'.$venta->id)}}" class="btn btn-outline-info btn-sm">Ver Detalles</a>
                    <a href="{{url('ventas/imprimir/'.$venta->codigo)}}" class="btn btn-outline-danger btn-sm">Ver Comprobante</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
