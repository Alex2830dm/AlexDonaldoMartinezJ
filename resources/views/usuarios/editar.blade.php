@extends('layouts.app')
@section('title1', 'Usuarios')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('usuarios/nuevo')}}">
        <button class="btn  btn-sm btn-primary">Registrar Nuevo Usuario</button>
    </a>
</div>
@endsection
@section('title2', 'Lista de usuarios')
@section('contenido')
<div class="container">
    <form action="{{url('usuarios/salvar/'.$detalles->id)}}" method="post">
        {{csrf_field()}} {{method_field('PUT')}}
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre:</label>
                    <input type="text" class="form-control form-control" name="name" value="{{$detalles->name}}">
                </div>
            </div>
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control form-control-sm" value="{{$detalles->email}}" name="email">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                <div class="form-group">
                    <label for="exampleInputPassword1">Tipo de Usuario</label>
                    <select name="tipo_usuario" id="" class="form-control">
                        @if($detalles->tipo_usuario == 1)
                            <option value="{{$detalles->tipo_usuario}}">Administrador - Encargado</option>
                            <option value="2">Trabajador</option>
                        @else
                            <option value="2">Trabajador</option>
                            <option value="1">Administrador - Encargado</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <label for="">Guardar Cambios</label>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </div>
    </form>
</div>
@endsection
