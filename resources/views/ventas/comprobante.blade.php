<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de Venta</title>
    <style>
        table {
            font-family: 'Courier New', Courier, monospace;
            font-size: 13px;
            align-content: center;
        }
    </style>
</head>

<body>
    <table>
        @foreach ($cliente as $cliente)
        <tr>
            <td>
                <h4>{{$cliente->cliente}}</h4>
                <label for="">Ruta: {{$cliente->rutas}}</label>
            </td>
            <td>                
                Enviar a: {{$cliente->representante}}
            </td>
            <td>
                @foreach ($venta1 as $venta)
                    <b> Vendedor: </b> {{$venta->id_encargado}} <br>
                   <b>Fecha:</b> Fecha: {{$venta->created_at}} <br>
                    <b>Folio:</b> {{$venta->codigo}}
                @endforeach
            </td>
        </tr>
        @endforeach
    </table>

    <br><hr>
    <h3>Detalles de la Venta</h3>
    <table>
        <thead>
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cantidad Vendida</th>
                <th scope="col">% Desc</th>
                <th scope="col">Precio Unitario</th>
                <th scope="col">Importe</th>
            </tr>
        </thead>
        <tbody align="center">
            @foreach ($detalles as $detalle)
            <tr>
                <td>{{$detalle->producto}}</td>
                <td>{{$detalle->descripcion}}</td>
                <td>{{$detalle->cantidad}} </td>
                <td>{{$detalle->descuento}} %</td>
                <td>$ {{$detalle->precio}} </td>
                <td>$ {{$detalle->costo}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4"></td>
                <td colspan="2">
                    <table class="table">
                        <tbody>
                            @foreach ($venta2 as $vent)
                            <tr>
                                <td><b>Subtotal:</b></td><td> $ {{$vent->subtotal}}</td>
                            </tr>
                            <tr>
                                <td><b>Descuento:</b></td><td> $ {{$vent->descuento}}</td>
                            </tr>
                            <tr>
                                <td><b>IVA: </b></td><td>% {{$vent->impuestos}}</td>
                            </tr>
                            <tr>
                                <td><b>Total: </b></td><td> $ {{$vent->total}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- <footer>
        <div align="right">
        <table class="table">
            <tbody>
                @foreach ($venta as $venta)
                <tr>
                    <td><b>Código de Venta: </b>{{$venta->codigo}}</td>
                </tr>
                <tr>
                    <td><b>Total de Venta:</b> $ {{$venta->subtotal}}</td>
                </tr>
                <tr>
                    <td><b>Total de descuento (% {{$venta->porcentaje_descuento}}):</b> {{$venta->descuento}}</td>
                </tr>
                <tr>
                    <td><b>IVA %: </b> {{$venta->impuestos}}</td>
                </tr>
                <tr>
                    <td><b>Fecha de Compra: </b>{{$venta->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </footer> --}}
</body>

</html>
