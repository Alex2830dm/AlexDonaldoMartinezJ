@extends('layouts.app')
@section('title1', 'Rutas')
@section('opciones')
<div class="header_toggle"> 
    <button id="mostrar" class="btn btn-sm btn-primary">Registrar Nueva Ruta</button>
</div>
<div class="header_toggle">    
    <button class="btn  btn-sm btn-success" id="mostrar2">Importar Datos</button>
</div>
@endsection
@section('title2', 'Rutas de Clientes')
@section('contenido')
<div id="registro" style="border:1px solid #337DF8;" class="row">
    <form action="{{url('clientes/salvarR')}}" method="POST">
        @csrf
        <div class="col-4">
            Ruta: <input type="text" name="ruta"  class="form-control form-control-sm">
        </div>
        <div class="col-4">
            <input type="submit" value="Enviar Datos" class="btn btn-success btn-sm">
        </div>
    </form>
</div>
<div id="importar">
    <table>
        <form action="{{route('clientes.import_rutas')}}" method="post" enctype="multipart/form-data">
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
            <th scope="col">No. Ruta</th>
            <th scope="col">Ruta - Lugar</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rutas as $ruta)
        <tr>
            <td>{{$ruta->id}}</td>
            <td>{{$ruta->ruta}}</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" id="{{$ruta->id}}">Clientes<i class='bx bxs-edit'></i></button>
            </td>
        </tr>
        <tr>
            <td colspan="5">
                <div id="info{{$ruta->id}}"></div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function(){
        $("#importar").hide();
        $("#mostrar2").on( "click", function() {
            $('#importar').show(); //muestro mediante id
        });
        $("#registro").hide();
        $("#mostrar").on( "click", function() {
            $('#registro').show(); //muestro mediante id
        });
        //-----------------------------------------
        var close = '';
        var after = '';
        $("button").click(function(){
            $("#info"+close).text('');
            after = close;
                //console.log('*'+after);
            
            close = $(this).attr("id");
  
  
            var id = $(this).attr("id");
            
            if(close == after){
                $("#info"+ after).text('');
                close = '';
            }else{
                $("#info"+id).load("{{ route('js02') }}?id=" + id).css({"background":"#FBE8E4"});
            }
        });
    });

</script>
@endsection
