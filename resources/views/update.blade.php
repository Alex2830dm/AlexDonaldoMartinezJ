@extends('layouts.app')
@section('title1', 'Mi Perfil')
@section('title2', 'Actualizar Mis Datos')
@section('contenido')
<div class="container">
    <form action="{{url('update/'.$datos->id)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('PATCH')}}
        <div class="row">
            <div class="col-6">                
                <img src="http://pm1.narvii.com/7920/23d0dc13cd9c52954d4cbb6daa3149de1f117f5fr1-554-554v2_00.jpg" alt="" width="300px" style="border-radius: 50%;"> 
            </div>
            <div class="col-6">
                <label for="name">Nombre(s):</label>
                <input type="text" name="name" id="" class="form-control" value="{{$datos->name}}">
                <label for="app">Apellido Paterno:</label>
                <input type="text" name="app" id="" class="form-control" value="{{$datos->app}}">
                <label for="apm">Apellido Materno:</label>
                <input type="text" name="apm" id="" class="form-control" value="{{$datos->apm}}">                
            </div>
        </div>
        <br><hr>
        <div class="row">
            <div class="col-4">
                <input type="submit" value="Actulizar Mis Datos" class="btn btn-outline-info">
            </div>    
        </div>
    </form>        
</div>
@endsection