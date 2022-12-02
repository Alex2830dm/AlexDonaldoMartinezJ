@extends('layouts.indexCli')
@section('titulo1', 'Historial de Preventas / Ventas')
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
                <th scope="col">Folio</th>
                <th scope="col">Total</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tipo de Pago</th>
                <th scope="col">Estatus Pago</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preventas as $preventa)
            <tr>
                <td>{{$preventa->codigo}}</td>
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

                @if($preventa->estatus_pago == "Pendiente")
                    @if($preventa->tipo_pago == 0)
                        <td class="text-danger">Sin Pago</td>
                    @elseif($preventa->tipo_pago == 1)
                        <td class="text-warning">Se cobrará el día de entrega</td>
                    @else
                        <td>
                            <a href="{{route('processPaypal')}}" class="btn btn-outline-primary btn-sm">Pagar Con PayPal</a>
                        </td>
                    @endif
                @else
                    <td class="text-success">{{$preventa->estatus_pago}}</td>
                @endif

                <td>
                    <a href="{{url('ventas/show/'.$preventa->id)}}" class="btn btn-outline-info btn-sm">Detalles</a>
                    @if($preventa->tipo == "Venta" && $preventa->estatus_pago == "Pagado")
                        <a href="{{url('ventas/imprimir/'.$preventa->codigo)}}" class="btn btn-outline-danger btn-sm">Comprobante</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
