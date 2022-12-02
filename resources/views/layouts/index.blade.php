<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Frefrigel S.A de C.V</title>
    <link href="{{asset('dist_406/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('dist/css/estilos.css')}}">
    <link rel="icon" href="{{asset('img/productos/producto.jpg')}}">
    <script src="{{asset('dist/js/jquery-3.6.0.min.js')}}"></script>
</head>
<body>
    <section>
        <header>
            <a href="{{url('/')}}" class="logo">
                <img src="{{asset('img/logo.png')}}" width="70" alt="">
                @yield('titulo1')
            </a>
            <div class="toggle" onclick="menuToggle()"></div>
            <ul class="nav">
                <li><a href="{{route('inicio')}}" style="--i:1">Inicio</a></li>
                <li><a href="{{route('quienesSomos')}}" style="--i:2">¿Quienes Sómos?</a></li>
                <li><a href="{{route('productos')}}" style="--i:3">Productos</a></li>
                <li><a href="{{url('ventas')}}" style="--i:4">Ventas</a></li>
                <li><a href="{{route('contacto')}}" style="--i:5">Contacto</a></li>
                
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