@extends('layouts.index')
@section('titulo1', 'Productos de FREFRIGEL')
@section('contenido')
<div class="container">
    @foreach ($productos as $producto)
        
    @endforeach
    <div class="card" style="width: 18rem;">
        <img src="https://s.cornershopapp.com/product-images/341745.jpg?versionId=gM2PCN2IwK3H3j4YX732Bg0bWK3D52zA" height="200" width="auto" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{$producto->producto}}</h5>
            <p class="card-text">{{$producto->descripcion}}</p>
            <b>Precio:</b> ${{$producto->precio}}
        </div>
      </div>
</div>
@endsection