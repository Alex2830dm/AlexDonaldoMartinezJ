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
            @foreach ($preventas as $preventa)
            <tr>
                <td>{{$preventa->id}}</td>
                <td>{{$preventa->codigo}}</td>
                <td>{{$preventa->cliente}}</td>
                <td> $ {{$preventa->total}} MXN</td>
                <td>{{$preventa->tipo}}</td>    
                
                {{-- If para identificar el tipo de pago --}}
                @if($preventa->tipo_pago == 0)
                    <td class="text-danger">Sin Pago</td>
                @elseif($preventa->tipo_pago == 1)
                    <td class="text-warning">Efectivo</td>
                @else
                    <td class="text-info">PayPal</td>
                @endif                

                <td>{{$preventa->estatus_pago}}</td>

                <td>
                    <a href="{{url('ventas/show/'.$preventa->id)}}" class="btn btn-outline-info btn-sm">Ver Detalles</a>
                    <a href="{{url('preventas/confirmar/'.$preventa->id)}}" class="btn btn-outline-success btn-sm">Confirmar Venta</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
