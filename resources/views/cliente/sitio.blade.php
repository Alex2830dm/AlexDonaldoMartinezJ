@extends('layouts.indexCli')
@section('titulo1')
Bienvenido {{auth()->user()->name}}
@endsection
@section('contenido')
<div class="contenedor">

    <div class="caja" style="--i:3">
        <div class="img">
            {{-- <img src="{{asset('img/Wendy1.jpeg')}}" alt=""> --}}
            <img src="https://fisair.com/wp-content/uploads/2018/01/fotoss.jpg" alt="">
        </div>
    </div>
    <div class="caja" style="--i:4">
        <div class="img">
            {{-- <img src="{{asset('img/Wendy2.jpeg')}}" alt=""> --}}
            <img src="https://www.mexicodesconocido.com.mx/wp-content/uploads/2017/09/dulces-tipicos-mexicanos-1.jpg" alt="">
        </div>
    </div>
    <div class="caja" style="--i:5">
        <div class="img">
            {{-- <img src="{{asset('img/Wendy3.jpeg')}}" alt=""> --}}
            <img src="https://www.todoparaellas.com/u/fotografias/m/2021/5/6/f608x342-25503_55226_15.jpg" alt="">
        </div>
    </div>
    <div class="caja" style="--i:6">
        <div class="img">
            {{-- <img src="{{asset('img/Wendy4.jpeg')}}" alt=""> --}}
            <img src="https://animalgourmet.com/wp-content/uploads/2014/09/dulces-.jpg" alt="">
        </div>
    </div>
</div> 
@endsection