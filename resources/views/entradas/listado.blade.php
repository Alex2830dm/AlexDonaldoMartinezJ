@extends('layouts.app')
@section('title1', 'Entradas de Productos')
@section('title2', 'Historial de Entradas de Productos')
@section('opciones')
<div class="header_toggle"> 
    <a href="{{url('entradas/nueva')}}">
        <button type="button" class="btn btn-default btn-primary btn-sm">Nueva Entrada</button>
    </a> 
</div>
<div class="header_toggle"> 
    <a href="{{url('productos')}}">
        <button type="button" class="btn btn-default btn-primary btn-sm">Productos</button>
    </a> 
</div>
@endsection
@section('contenido')
<div class="row">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código Entrada</th>
                <th scope="col">Responsable</th>
                <th scope="col">Fecha y Hora</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($entradas as $entradas)
                <tr>
                    <td>{{$entradas->id}}</td>
                    <td>{{$entradas->codigo}}</td>
                    <td>{{$entradas->id_encargado}} - {{$entradas->name}}</td>
                    <td>{{$entradas->created_at}}</td>
                    <td>
                        <a href="{{url('entradas/show/'.$entradas->id)}}">
                            <button type="button" class="btn btn-primary btn-sm">Ver detalles</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
