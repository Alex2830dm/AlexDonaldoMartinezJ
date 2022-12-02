@extends('layouts.app')
@section('title1', 'Entradas de Productos')
@section('opciones')
<div class="header_toggle">
    <a href="{{url('entradas/')}}">
        <button class="btn  btn-sm btn-primary">Entradas</button>
    </a>
</div>
@endsection
@section('title2', 'Detalles de Entrada')
@section('contenido')
<div class="container">
    <table class="table">
        <tbody>
            <tr>
                <td rowspan="5">
                    <img src="https://scontent.fmex10-2.fna.fbcdn.net/v/t1.6435-9/53259908_341690773221493_7536936695535501312_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=e3f864&_nc_eui2=AeFs1Z3cccU7nmlaxTeNf_hRnvi8ahLfcGue-LxqEt9wa5pt1qE5_DluaGqkKoZGaf_GKr5LpvV7tWMhopgIV0L7&_nc_ohc=GazpnwpXiyEAX_bXMU7&_nc_ht=scontent.fmex10-2.fna&oh=00_AT8cCwtbo325AkHDvcGAD6M_DjvAdEcLZGvEBwK05Rw_jA&oe=62611579"
                        width="200">
                </td>
            </tr>
            <tr>
                <td><b>Entrada de Productos: </b>{{$entrada->codigo}}</td>
            </tr>
            <tr>
                <td><b>Costo Aproximado de Entrada:</b> $ {{$entrada->costo}}</td>
            </tr>
            <tr>
                <td><b>Frefigel S.A de C.V</b> </td> </tr> <tr>
                <td><b>Fecha de Compra: </b>{{$entrada->created_at}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Stock Antes</th>
                <th scope="col">Stock Despues</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stock as $stock)
            <tr>
                <td>{{$stock->idc}}</td>
                <td>{{$stock->producto}}</td>
                <td>{{$stock->stock - $stock->cantidad}} {{$stock->unidad}}</td>
                <td>{{$stock->stock}} {{$stock->unidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
