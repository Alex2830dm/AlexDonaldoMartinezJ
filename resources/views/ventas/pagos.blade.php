@extends('layouts.indexCli')
@section('titulo1', 'Guardar Pago de PayPal')
@section('contenido')
<div class="container">
    <form action="{{url('ventas/status/paypal')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="">Codigo de Pago PayPal: </label>
                <input type="text" id="" class="form-control" name="payerID" value="{{$payerID}}">
            </div>
            <div class="col-6">
                <label for="">Estatus Venta:</label>
                <input type="text" class="form-control" name="estaus" value="Pagado" readonly>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                @foreach ($venta as $venta)
                    <label for="">Codigo de Venta:</label>
                    <input type="text" class="form-control" id="" value="{{$venta->codigo}}">
                    <input type="hidden" name="id_venta" id="" value="{{$venta->id}}">
                @endforeach                
            </div>
            <div class="col-6">
                <label for="">Confirmar: </label> <br>
                <input type="submit" value="Confirmar Pago" class="btn btn-success">
            </div>
        </div>
    </form>
</div>
@endsection