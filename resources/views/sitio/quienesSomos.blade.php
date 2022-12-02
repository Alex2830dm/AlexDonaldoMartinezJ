@extends('layouts.index')
@section('titulo1', '¿Quienes Somos?')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h3>Nuestra Misión</h3>
            <hr>
            <div class="frefrigel">
                Nuestra misión es ofrecerles lineas de productos que le generen amplio margen de utilidad, así mismo, constantemente estamos ofreciendo nuevas novedades y dulces con precios competitivos
            </div>
        </div>
        <div class="col-6">
            <img src="{{asset('img/Mision.jpg')}}" alt="Mision" height="300">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-6">
            <img src="{{asset('img/Vision.jpg')}}" alt="Vision" height="300">
        </div>  
        <div class="col-6">
            <h3>Visión</h3>
            <hr>
            <div class="frefrigel">
                Llegar a ser el Distribuidor de preferencia en el valle de Toluca y Estado de México,por los precios, utilidades y confianza que nuestros clientes nos otorgan en la compra venta y
                distribución de productos de calidad.
            </div>
        </div>             
    </div> 
    <hr>
    <div class="row">
        <div class="col-6">
            <h3>Obejtivos</h3>
            <hr>
            <div class="frefrigel">
                Ser promotor de generación de empleos alrededor de la ubicación de la empresa a fin de contribuir con un bienestar social a las personas y empleados
                que contribuyen en la empresa.
            </div>
        </div>
        <div class="col-6">
            <img src="{{asset('img/Objetivos.jpg')}}" alt="Objetivos" height="300">
        </div>       
    </div> 
    <hr>
    <div class="row">
        <div class="col-6">
            <img src="{{asset('img/Servicios.png')}}" alt="Servicios" height="300">
        </div>
        <div class="col-6">
            <h3>Nuestros Servicios</h3>
            <hr>
            <div class="frefrigel">
                Entregamos las mercancias en diferentes municipios del Estado de Mexico, se hace devoluciones por productos sin rotacion, dano u otra situacion, segun lo amerite.
                Contáctanos al Tel. 722 273 4227 estamos a sus órdenes de Lunes a Sábado 10:00 hrs a 17:00 hrs.
            </div>
        </div>
    </div>
</div>
@endsection