@extends('layouts.indexCli')
@section('titulo1', 'Productos de FREFRIGEL')
@section('contenido')
<div class="container">
    <div class="row">        
        @foreach ($productos as $producto)
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/productos/'.$producto->foto)}}" height="200" width="auto" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$producto->producto}}</h5>
                    <p class="card-text">{{$producto->descripcion}}</p>
                    <b>Precio:</b> ${{$producto->precio}}
                </div>
            </div>
        </div>
        @endforeach    
    </div>
</div>
@endsection