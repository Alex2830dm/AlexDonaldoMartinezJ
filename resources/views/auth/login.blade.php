<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Inicio de Sesión</title>
    <link rel="icon" href="{{asset('img/productos/producto.jpg')}}">

    {{-- <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/"> --}}
    



    <!-- Bootstrap core CSS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('dist_406/css/bootstrap.min.css')}}" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



    <style>
        body{
            background-color: #0BAACA;
            background-size: cover;
            background-size: 80%;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;            
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">    
</head>

<body class="text-center" background="{{asset('img/Fondo.jpg')}}">

    <form action="{{url('logueo')}}" method="POST" class="form-signin">
        {{csrf_field()}}
        <h1 class="h3 mb-3 font-weight-normal text-white">Iniciar Sesión</h1>
        <label for="inputEmail" class="sr-only">Correo electronico</label>
        <input type="email" id="email" class="form-control" name="email" placeholder="Ingresa el Correo">
        @if($errors->first('email'))
            <p class="text-danger">El Correo Es Obligatorio</p>
        @endif
        <label class="sr-only">Contraseña</label>
        <input type="password" id="password" class="form-control" name="password" placeholder="Ingresa la Contraseña">
        @if($errors->first('password'))
            <p class="text-danger">La Contraseña Es Obligatoria</p>
        @endif
        @if(Session::has('mensaje'))
            <div class="alert alert-danger" role="alert">
                {{Session::has('mensaje')}}
            </div>
        @enderror
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar Sesión</button>        
    </form>
</body>

</html>