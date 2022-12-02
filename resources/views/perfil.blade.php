@extends('layouts.app')
@section('title1', 'Mi Perfil')
@section('title2')
{{auth()->user()->name}}
@endsection
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-6">
            <img src="{{asset('img/perfil/'. auth()->user()->foto)}}" alt="" width="300px" style="border-radius: 50%;"> 
            <br>
            <button class="btn  btn-sm btn-outline-info" id="mostrar">Cambiar Foto</button>
            <div id="foto">
                <form action="{{url('foto_perfil/'.auth()->user()->id)}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}} {{method_field('PATCH')}}
                    <tr>                        
                        <td><input class="form-control form-control-sm" type="file" name="foto"></td>
                        <td><input type="submit" value="Enviar Datos" class="btn  btn-sm btn-outline-success"></td>
                    </tr>
                </form>
            </div>
        </div>
        <div class="col-6">
            <p> <b> Nombre: </b> {{auth()->user()->name}} <br> </p>
            <p> <b>Apellido Paterno: </b> {{auth()->user()->app}}  </p> 
            <p> <b>Apellido Materno: </b> {{auth()->user()->apm}} </p>
            <p> <b>Correo Electrónico: </b> {{auth()->user()->email}}  </p>
            <p> <b>Tipo de Usuario: </b> </p>            
        </div>
    </div>
    <br><hr>
    <div class="row">
        <div class="col-4">
            <a href="{{url('actulizar_datos/'.auth()->user()->id)}}" class="btn btn-outline-info">Editar Mis Datos</a>    
        </div>    
    </div>    
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#foto").hide();
            $("#mostrar").on( "click", function() {
                $('#foto').show(); //muestro mediante id			
             });
        });
</script>
@endsection
