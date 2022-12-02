@extends('layouts.app')
@section('title1', 'Usuarios')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('usuarios/nuevo')}}">
        <button class="btn  btn-sm btn-primary">Registrar Nuevo Usuario</button>
    </a>
</div>
<div class="header_toggle">
    <a href="{{url('usuarios/inactivos')}}">
        <button class="btn  btn-sm btn-primary">Usuarios Inactivos</button>
    </a>
</div>
<div class="header_toggle">
    <a href="{{url('usuarios/pdf')}}">
        <button class="btn  btn-sm btn-danger">Exportar PDF</button>
    </a>
</div>
@endsection
@section('title2', 'Lista de usuarios')
@section('contenido')
@if(Session::has('estatus'))
<div class="alert alert-success alert-dismissible" role="alert">
    <p class="text-success">{{Session::get('estatus')}}</p>
</div>
@endif
<table class="table table-bordered">    
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo</th>
            <th scope="col">Tipo de usuario</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuarios)
            <tr align="center">
                <td>{{$usuarios->id}}</td>
                <td>{{$usuarios->name}}</td>
                <td>{{$usuarios->email}}</td>
                <td>{{$usuarios->tipo_usuario == 1 ? "Administrador" : "Empleado"}}</td>
                <td>
                        <a href="{{url('usuarios/editar/'.$usuarios->id)}}">
                            <button type="button" class="btn btn-primary btn-sm">Editar <i class='bx bxs-edit'></i></button>
                        </a> 
                        <a href="{{url('usuarios/eliminar', ['id'=> $usuarios->id])}}">
                            <button type="button" class="btn btn-danger btn-sm"  onclick="return confirm('¿Deseas Eliminarlo?')">Eliminar<i class='bx bxs-delete'></i></button>
                        </a>
                        <a href="{{url('usuarios/inactivo', ['id'=> $usuarios->id])}}">
                            <button type="button" class="btn btn-warning btn-sm"  onclick="return confirm('¿Deseas Eliminarlo?')">Eliminar Temp.<i class='bx bxs-delete'></i></button>
                        </a>
                    </form>
                </td>
            </tr>          
        @endforeach
    </tbody>
</table>
@endsection