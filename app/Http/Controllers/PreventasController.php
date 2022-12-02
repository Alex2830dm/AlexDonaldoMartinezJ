<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Detalles;

class PreventasController extends Controller {
    
    public function index() {
        $preventas = Ventas::join('users', 'ventas.id_cliente', '=', 'users.id')
                    ->select('ventas.id', 'ventas.codigo', 'users.name As cliente', 'ventas.total', 'ventas.tipo', 'ventas.tipo_pago', 'ventas.estatus_pago')
                    ->get();
        return view('ventas.preventas')->with('preventas', $preventas);
    }

    public function preventasCli($id) {
        $preventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.codigo')
                    ->select('ventas.id', 'ventas.codigo', 'clientes.cliente', 'ventas.total', 'ventas.tipo', 'ventas.tipo_pago', 'ventas.estatus_pago')
                    ->where('ventas.id_cliente', '=', $id)
                    ->get();
        //return response()->json($preventas);
        return view('cliente.preventas')->with('preventas', $preventas);
    }

    public function storeP(Request $request) {
        //dd($request);
        $request->validate([ 'id_cliente'  => 'required' ]);
        $preventas = new Ventas;
        $preventas->id_cliente = request('id_cliente');
        $preventas->codigo = request('codigo');
        $preventas->subtotal = request('subtotal');
        $preventas->impuestos = request('impuestos');
        $preventas->total = request('total');
        $preventas->tipo = 'Preventa';
        $preventas->save();

        $id_producto = $request->get('id_producto');
        $cantidad = $request->get('cantidad');
        $importe = $request->get('importe');
        $codigo = request('codigo');
    
        //dd($idproducto);
        $cont = 0;
        while($cont < count($id_producto)){
            $detalles = new Detalles;
            $detalles->codigo = request('codigo');
            $detalles->idc = $id_producto[$cont];
            $detalles->cantidad = $cantidad[$cont];
            $detalles->importe = $importe[$cont];
            $detalles->save();
            $cont = $cont+1;
        }
        $detalles = Ventas::join('detalles', 'ventas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('detalles.idc', 'productos.producto', 'productos.unidad', 'detalles.cantidad',  'detalles.importe')
                    ->where('ventas.codigo', '=', $codigo)
                    ->get();
        //return redirect('entradas/');
        //return redirect('ventas/');
        return view('preventas.detalle')->with(["venta" => $preventas, 'detalle' => $detalles]);
        //return response($ventas);
    }  

}
