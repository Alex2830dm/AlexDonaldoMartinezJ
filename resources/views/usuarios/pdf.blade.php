<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal de Frefrigel</title>
    <link href="{{asset('dist_406/css/bootstrap.min.css')}}" rel="stylesheet" >
</head>
<body>
    <div class="alert alert-primary" role="alert">
        Personal de Frefrigel
    </div>
    <table class="table table-bordered table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Tipo de usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuarios)
                <tr align="center">
                    <td>{{$usuarios->id}}</td>
                    <td>{{$usuarios->name}}</td>
                    <td>{{$usuarios->email}}</td>
                    <td>{{$usuarios->tipo_usuario == 1 ? "Administrador" : "Empleado"}}</td>
                </tr>          
            @endforeach
        </tbody>
    </table>
</body>
</html>