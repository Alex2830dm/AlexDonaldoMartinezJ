@extends('layouts.app')
@section('title1', 'Entradas')
@section('title2', 'Detalles de Entrada')
@section('contenido')
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading">
        <h4>FREFRIGEL S.A de C.V</h4>
        Calle Centenario 112, San Miguel Totoltepec, Toluca, México, C.P. 52225 <br>
        FREFRIGEL S.A. DE C.V.  RFC: FRE980902K1 Tel. 722 2734227
    </div><br>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                @foreach($fecha as $fecha)
                <b> Responsable de la entrada: </b>{{$fecha->name}}
                <p><b>Fecha y hora de entrada: </b> {{$fecha->created_at}}</p>
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
                    <th scope="col">Codigo de Entrada</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Costo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entradas as $entradas)
                <tr>
                    <td>{{$entradas->id}}</td>
                    <td>{{$entradas->codigo}}</td>
                    <td>{{$entradas->idc}} - {{$entradas->descripcion}}</td>
                    <td>{{$entradas->cantidad}} - {{$entradas->unidad}}</td>
                    <td> $ {{$entradas->importe}}</td>
                </tr>
                @endforeach
                <tr class="table-info">
                    <td colspan="4">Costo Aprox. Entrada</td>
                    <td>$ {{$total->costo}}</td>
                </tr>
            </tbody>
        </table>
    </table>
</div>
@endsection
