@extends('layouts.app')
@section('title1', 'Productos')
@section('title2')
Editar Registro de: {{$detalles->producto}} - {{$detalles->unidad}}
@endsection
@section('contenido')
<div class="container">
    <form action="{{url('productos/update/'.$detalles->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}} {{method_field('PATCH')}}
        <div class="row">
            <div class="col-7">
                <table>
                    <tr>
                        <td>Nombre del Producto</td>
                        <td><input type="text" name="producto" id="" class="form-control" value="{{$detalles->producto}}"></td>
                        <td>Unidad del Producto</td>
                        <td>
                            <select name="unidad" class="form-control">
                                    @if($detalles->unidad == "Piezas")
                                        <option value="Piezas">Piezas</option>
                                        <option value="Cajas">Cajas</option>
                                    @elseif($detalles->unidad != "Piezas")
                                        <option value="Cajas">Cajas</option>
                                        <option value="Piezas">Piezas</option>
                                    @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td colspan="3"><input type="text" name="descripcion" id="" class="form-control" value="{{$detalles->descripcion}}"></td>
                    </tr>
                    <tr>
                        <td>Cantidad: </td>
                        <td><input type="text"  id="" class="form-control" value="{{$detalles->cantidad}}" readonly></td>
                        <td>Precio de Producto</td>
                        <td><input type="text" name="precio" id="" class="form-control" value="{{$detalles->precio}}"></td>
                    </tr>
                    <tr>
                        <td>Tipo de Producto</td>
                        <td>
                            <select name="tipo" class="form-control">
                                    @if($detalles->tipo == "Producido")
                                        <option value="Producido">Producido</option>
                                        <option value="Comprado">Comprado</option>
                                    @elseif($detalles->tipo != "Piezas")
                                        <option value="Comprado">Comprado</option>
                                        <option value="Producido">Producido</option>
                                    @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Cambiar Imagen:</td>
                        <td>
                            <input type="file" name="foto" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-5">
                <label for="">Imagen el Producto</label> <br>
                <img src="{{asset('img/productos/'.$detalles->foto)}}" width="250" height="auto" alt="{{$detalles->producto}}">
            </div>
        </div>
        <hr>
        <input type="submit" value="Enviar Datos" class="btn btn-outline-success">
        <input type="reset" value="Cancelar Registro" class="btn btn-outline-danger">
    </form>
</div>
@endsection