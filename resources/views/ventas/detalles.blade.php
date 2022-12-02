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
<div class="panel panel-default">
    <div class="panel-heading">
        @foreach ($cliente as $cliente)
        <div class="row">
            <div class="col-5">
                <p><b>Venta de producctos - Cliente: </b> {{$cliente->id}}, {{$cliente->cliente}}</p>
                <b>Representante:</b> {{$cliente->representante}} |  Telefono: {{$cliente->telefono}} |
                <p><b>Datos de Domicilio:</b> {{$cliente->ruta}} {{$cliente->d_calle}}, {{$cliente->d_coloinia}}, {{$cliente->d_municipio}}
                <br> Referencias: {{$cliente->d_referencia}}</p>
            </div>
            <div class="col-1"></div>
            <div class="col-5">
                <b>Tipo de Pago: </b>
                @if($cliente->tipo_pago == 0)
                    Sin Pago
                @elseif($cliente->tipo_pago == 1)
                    Efectivo
                @else
                    PayPal
                    <br>
                    <b>PayerId: {{$cliente->PayerID}}</b>
                @endif 
                <br>
                <b>Estatus de Pago: </b> {{$cliente->estatus_pago}}
            </div>
        </div>
        @endforeach
    </div>
    <hr>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                FREFRIGEL S.A de C.V
                <p>Aqui se ponen datos de la empresa<p>
            </div>            
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                @foreach ($responsable as $responsable)
                    <label for="">Responsable de la compra: {{$responsable->id}} - {{$responsable->name}}</label>
                    <p><label for="">Fecha y hora de compra: {{$responsable->created_at}}</label></p>
                @endforeach
            </div>
        </div>        
    </div>
    <!-- Table -->
    <table class="table">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Codigo Compra</th>
                    <th scope="col">Materia Prima</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total por producto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $ventas)
                <tr>
                    <td>{{$ventas->id}}</td>
                    <td>{{$ventas->codigo}}</td>
                    <td>{{$ventas->idproducto}} {{$ventas->descripcion}}</td>
                    <td>{{$ventas->cantidad}}</td>
                    <td>{{$ventas->precio}}</td>
                    <td>{{$ventas->costo}}</td>
                </tr>                     
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td>Subtotal:</td>
                    <td>$ {{$total->subtotal}} MXN </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>Desuento Total:</td>
                    <td>$ {{$total->descuento}} MXN</td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>Impuestos:</td>
                    <td>% {{$total->impuestos}} </td>
                </tr>
                <tr>
                    <td colspan="4"></td>
                    <td>Total de compra: </td>
                    <td>$ {{$total->total}} MXN</td>
                </tr>
            </tbody>
        </table>
    </table>
</div>
@endsection