<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frefrigel S.A de C.V</title>
    <link rel="stylesheet" href="{{asset('dist_406/css/bootstrap.min.css')}}" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('dist/css/estilos.css')}}">
    <link rel="icon" href="{{asset('img/productos/producto.jpg')}}">
    <script src="{{asset('dist/js/jquery-3.6.0.min.js')}}"></script>
</head>
<body>
    <section>
        <header>
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('img/logo.png')}}" width="50" alt="">
                @yield('titulo1')
            </a>
            <div class="toggle" onclick="menuToggle()"></div>
            <ul class="nav">
                <li><a href="{{url('cliente/')}}" style="--i:1">Inicio</a></li>
                <li><a href="{{url('cliente/productos')}}" style="--i:2">Productos</a></li>
                <li><a href="{{url('cliente/preventas/'.auth()->user()->codigo)}}" style="--i:3">Preventas</a></li>
                <li><a href="{{url('cliente/preventa')}}" style="--i:4">Nueva Preventa</a></li>
                <li><a href="{{url('cliente/contacto')}}" style="--i:5">Contacto</a></li>
                <li><a href="{{route('logout')}}" style="--i:5">Cerrar Sesion</a></li>
                
            </ul>
        </header>
        @yield('contenido')
    </section>    
</body>
<script>
    let img = document.querySelectorAll('.img');
    img.forEach(popup => popup.addEventListener('click', () => {
        popup.classList.toggle('active');
    }))
    function menuToggle() {        
        const toggleMenu = document.querySelector('.toggle');
        const nav = document.querySelector('.nav');
        toggleMenu.classList.toggle('active');
        nav.classList.toggle('active');
    }
</script>
</html>