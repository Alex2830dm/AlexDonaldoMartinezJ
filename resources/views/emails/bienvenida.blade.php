<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de Registro</title>
</head>
<body>
    <h4>Hola {{$msg['name']}}</h4>
    
    <p>Estamos encantados de darle la bienvenida al equipo de Frefrigel S.A de C.V. ¡Estamos haciendo algunos trabajos emocionantes aquí, y esperamos que su talento, entusiasmo e ideas frescas sean invaluables para nosotros!</p>

    <p>Has sido dado de alta como: @if ($msg['tipo_usuario'] == 1 ) Administrador @else Empleado @endif.</p>
    Tu correo de acceso es: {{$msg['email']}}. <br>
    Tu contraseña de acceso es: {{$msg['password']}}
</body>
</html>