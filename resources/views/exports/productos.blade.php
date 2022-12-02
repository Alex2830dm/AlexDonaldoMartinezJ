<table border="3">    
    <thead align="center">
        <tr>
            <td colspan="5" bgcolor="#91DFDA">Listado de Productos</td>
        </tr>
    <tr>
        <th bgcolor="#DF9191">ID</th>
        <th bgcolor="#DF9191">Producto</th>
        <th bgcolor="#DF9191">Descripción</th>
        <th bgcolor="#DF9191">Unidad</th>
        <th bgcolor="#DF9191">Precio</th>
    </tr>
    </thead>
    <tbody align="center">
    @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id }}</td>
            <td>{{ $producto->producto }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->unidad }}</td>
            <td>{{ $producto->precio }}</td>
        </tr>
    @endforeach
    </tbody>
</table>