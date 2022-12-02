<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 8|E-Mail</title>
    </head>
<body>
    <form action="{{ route('enviar-emial') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <table border="0">
        <tr>
            <th>Nombre:</th>
            <td>
                <input type="text" name="nombre">
            </td>
        </tr>
        <tr>
            <th>E-mail:</th>
            <td>
                <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <th>Asunto:</th>
            <td>
                <input type="text" name="asunto">
            </td>
        </tr>
        <tr>
            <th>Escribe el mensaje:</th>
            <td>
                <textarea name="contenido"></textarea>
            </td>
        </tr>
        <tr>
            <th>Adjuntar Archivo</th>
            <td>
                <input type="file" name="archivo">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Enviar">
            </td>
        </tr>
    </table>
    </form>
</body>
</html>

