@extends('layouts.app')
@section('title1', 'Clientes')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('clientes/nuevo')}}">
        <button class="btn  btn-sm btn-primary">Registrar Nuevo Cliente</button>
    </a>
</div>
<div class="header_toggle">
    <a href="{{url('clientes/rutas')}}">
        <button class="btn  btn-sm btn-primary">Ver Rutas</button>
    </a>
</div>
<div class="header_toggle">
    <button class="btn  btn-sm btn-success" id="mostrar">Importar Datos</button>    
</div>
@endsection
@section('title2', 'Clientes')
@section('contenido')
<div id="importar">
    <table>
        <form action="{{route('clientes.import')}}" method="post" enctype="multipart/form-data">
            @csrf
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
            <th scope="col">Cliente</th>
            <th scope="col">Ruta - Lugar</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Opciones</th>            
        </tr>
    </thead>
    <tbody>
        @foreach ($clientes as $clientes)
            <tr>
                <td>{{$clientes->id}}</td>
                <td>{{$clientes->cliente}}</td>
                <td>{{$clientes->ruta}} - {{$clientes->rl}}</td>
                <td>{{$clientes->d_calle}}, {{$clientes->d_colonia}}, {{$clientes->d_municipio}}</td>
                <td>                    
                    <form action="{{url('clientes/eliminar/'.$clientes->id)}}" method="POST">
                        <a href="{{url('clientes/editar/'.$clientes->id)}}">
                            <button type="button" class="btn btn-primary btn-sm">Editar <i class='bx bxs-edit'></i></button>
                        </a>
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Eliminar')"class="btn btn-danger btn-sm">                            
                            Eliminar <i class='bx bx-x-circle'></i>
                        </button>
                        <a href="#">
                            <button type="button" class="btn btn-warning btn-sm">Eliminar Temp <i class='bx bxs-error-circle'></i></button>
                        </a>
                    </form>                    
                </td>
            </tr>          
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $("#importar").hide();
        $("#mostrar").on( "click", function() {
            $('#importar').show(); //muestro mediante id
        });
    });
</script>
@endsection
