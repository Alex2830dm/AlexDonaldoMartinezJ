@extends('layouts.app')
@section('title1', 'Productos')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('productos/nuevo')}}">
        <button class="btn  btn-sm btn-primary">Registrar Nuevo</button>
    </a>
</div>
<div class="header_toggle">
    <a href="{{route('productos.pdf')}}">
        <button class="btn  btn-sm btn-danger">Exportar a PDF</button>
    </a>
</div>
<div class="header_toggle">
    <button class="btn  btn-sm btn-success" id="mostrar">Importar Datos</button>
</div>
@endsection
@section('title2', 'Listado de Productos')
@section('contenido')
@if(Session::has('status'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="text-success">{{Session::get('status')}}</p>
</div>
@endif
<div class="row">
    <div id="importar">
        <table>
            <form action="{{route('productos.import')}}" method="post" enctype="multipart/form-data">
                <tr>
                    <td colspan="6">Importar Datos</td>
                    <td><input class="form-control form-control-sm" type="file" name="import" accesskey=".xlsx, .xls"></td>
                    <td><input type="submit" value="Enviar Datos" class="btn  btn-sm btn-success"></td>
                </tr>
            </form>
        </table>
    </div>      
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Unidad</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Cantidad en Inventario</th>
                <th scope="col">Precio</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $productos)
            <tr align="center">
                <td>{{$productos->id}}</td>
                <td>{{$productos->producto}}</td>
                <td>{{$productos->unidad}}</td>
                <td>{{$productos->descripcion}}</td>
                <td>{{$productos->cantidad}}</td>
                <td>${{$productos->precio}}</td>
                <td>{{$productos->tipo}}</td>
                <td>
                    <form action="{{url('productos/eliminar/'.$productos->id)}}" method="POST">
                        <a href="{{url('productos/show/'.$productos->id)}}">
                            <button type="button" class="btn btn-primary btn-sm">Editar <i
                                    class='bx bxs-edit'></i></button>
                        </a>
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Eliminar')" class="btn btn-danger btn-sm">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#importar").hide();
            $("#mostrar").on( "click", function() {
                $('#importar').show(); //muestro mediante id			
             });
        });
</script>
@endsection
