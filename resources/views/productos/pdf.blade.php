<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario de Productos</title>
    <link href="{{asset('dist_406/css/bootstrap.min.css')}}" rel="stylesheet" >
</head>
<body>
    <div class="alert alert-primary" role="alert">
        Inventario de Productos en Frefrigel
    </div>
    
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad en Inventario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr align="center">
                <td>{{$producto->producto}} - {{$producto->uni}}</td>
                <td>{{$producto->cantidad}}</td>
            </tr>          
            @endforeach
        </tbody>
    </table>
</body>
</html>