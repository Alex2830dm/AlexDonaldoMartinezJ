<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Productos;
use App\Models\Detalles;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VentasController extends Controller {
    //Ventas
    public function indexV() {
        $ventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                    ->select('ventas.id', 'ventas.codigo', 'clientes.cliente', 'ventas.total', 'ventas.tipo', 'ventas.tipo_pago', 'ventas.estatus_pago')
                    ->where('ventas.tipo', 'Venta')
                    ->get();
        return view('ventas.listado')->with('ventas', $ventas);
    }

    public function createV(){
        $clientes   = Clientes::select('id', 'cliente')->get();
        $folio = \DB::select('SELECT MAX(id) As folio FROM ventas');
        $productos  = Productos::select('id', 'descripcion', 'unidad')->get();

        return view('ventas.ventas')
            ->with([
                'folio'     => $folio,
                'clientes'  => $clientes,
                'productos' => $productos
            ]);
    }

    public function storeV(Request $request) {
        //dd($request);
        $request->validate([ 
            'id_cliente'  => 'required',
            'impuestos' => 'required'
        ]);
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        $ventas = new Ventas;
        $ventas->id_cliente = request('id_cliente');
        $ventas->id_encargado = request('id_encargado');
        $ventas->codigo = request('codigo');
        $ventas->subtotal = request('subtotal');
        $ventas->descuento = request('subdesc');
        $ventas->impuestos = request('impuestos');
        $ventas->total = request('total');
        $ventas->tipo_pago = request('tipo_pago');
        $ventas->tipo = 'Venta';
        $ventas->estatus_pago = "Pendiente";
        $ventas->PayerID = "";
        $ventas->created_at = $fecha;
        $ventas->save();

        $idproducto = $request->get('id_producto');
        $cantidad = $request->get('cantidad');
        $importe = $request->get('importe');
        $codigo = request('codigo');
        $descuento = $request->get('descuento');
    
        //dd($idproducto);
        $cont = 0;
        while($cont < count($idproducto)){
            $stock = Productos::where('id', $idproducto[$cont])->decrement('cantidad', $cantidad[$cont]);
            $detalles = new Detalles;
            $detalles->codigo = request('codigo');
            $detalles->idc = $idproducto[$cont];
            $detalles->cantidad = $cantidad[$cont];
            $detalles->importe = $importe[$cont];
            $detalles->descuento = $descuento[$cont];
            $detalles->save();
            $cont = $cont+1;
        }
        $detalle = Ventas::join('detalles', 'ventas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('detalles.idc', 'productos.producto', 'productos.unidad', 'detalles.cantidad',  'detalles.importe')
                    ->where('ventas.codigo', '=', $codigo)
                    ->get();
        //return redirect('entradas/');
        //return redirect('ventas/');
        //return view('ventas.detalle')->with(["venta" => $ventas, 'detalle' => $detalle]);
        //return response($ventas);        
        return view('ventas.detalle')->with(["venta" => $ventas, 'detalle' => $detalle]);        
    }

    public function confPago($id){
        $pago = Ventas::find($id);
        $pago->estatus_pago = "Pagado";
        $pago->update();

        return redirect('ventas');
    }

    public function show($id) {             
        $detallec  = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                    ->select('clientes.*', 'ventas.estatus_pago', 'ventas.tipo_pago', 'ventas.PayerID')
                    ->where('ventas.id', '=', $id)
                    ->get();
        $responsable = Ventas::join('users', 'ventas.id_encargado', '=', 'users.id')
                    ->select('users.id', 'users.name', 'ventas.created_at')
                    ->where('ventas.id', '=', $id)
                    ->get();
        $detallev  = Ventas::join('detalles', 'ventas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('ventas.id', 'ventas.codigo',
                    'detalles.idc', 'productos.descripcion', 'detalles.cantidad',
                    'productos.precio', 'detalles.importe')                    
                    ->where('ventas.id', '=', $id)
                    ->get();
        $total = Ventas::findOrFail($id);
        //return response()->json([ 'cliente' => $detallec, 'responsable' => $responsable, 'ventas' => $detallev, 'total' => $total]);
        return view('ventas.detalles')->with([ 'cliente' => $detallec, 'responsable' => $responsable, 'ventas' => $detallev, 'total' => $total]);
    }



    //Preventas
    public function indexP() {
        $preventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.codigo')
                    ->select('ventas.id', 'ventas.codigo', 'clientes.cliente', 'ventas.total', 'ventas.tipo', 'ventas.tipo_pago', 'ventas.estatus_pago')
                    ->where('ventas.tipo', '=', 'Preventa')
                    ->get();
        //return response()->json($preventas);
        return view('ventas.preventas')->with('preventas', $preventas);
    }

    public function confPreventa(Request $request) {
        //dd($request);
        $id = $request->get('id_venta');
        $codigo = $request->get("codigo");

        $venta = Ventas::find($id);
        $venta->tipo = "Venta";
        $venta->update();

        $idproducto = $request->get('id_producto');
        $cantidad = $request->get('cantidad');
        $cont = 0;

        while($cont < count($idproducto)){
            $stock = Productos::where('id', $idproducto[$cont])->decrement('cantidad', $cantidad[$cont]);
          $cont = $cont+1;
        }
        $venta = Ventas::find($id);
        $detalle = Ventas::join('detalles', 'ventas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('detalles.idc', 'productos.producto', 'productos.unidad', 'detalles.cantidad',  'detalles.importe')
                    ->where('ventas.codigo', '=', $codigo)
                    ->get();
        return view('ventas.detalle')->with(["venta" => $venta, 'detalle' => $detalle])
            ->with('estatus', 'La venta se ha confirmado correctamente');
    }

    public function createP() {
        
        $clientes   = Clientes::select('id', 'cliente')->get();
        $folio = \DB::select('SELECT MAX(id) As folio FROM ventas');
        $productos  = Productos::select('id', 'descripcion', 'unidad')->get();

        return view('ventas.preventa')
            ->with([
                'folio'     => $folio,
                'clientes'  => $clientes,
                'productos' => $productos
            ]);
    }
    public function storeP(Request $request) {
        //dd($request);
        $request->validate([ 'id_cliente'  => 'required' ]);
        $id_encargado = $request->get('id_encargado');

        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        $preventas = new Ventas;
        $preventas->id_encargado = request('id_encargado');
        $preventas->id_cliente = request('id_cliente');
        $preventas->codigo = request('codigo');
        $preventas->subtotal = request('subtotal');
        $preventas->impuestos = request('impuestos');
        $preventas->total = request('total');
        $preventas->tipo_pago = request('tipo_pago');
        $preventas->tipo = 'Preventa';
        $preventas->created_at = $fecha;
        $preventas->save();

        $id_producto = $request->get('id_producto');
        $cantidad = $request->get('cantidad');
        $importe = $request->get('importe');
        $codigo = request('codigo');
        $descuento = $request->get('descuento');
        $tipo = request('tipo');
    
        //dd($idproducto);
        $cont = 0;
        while($cont < count($id_producto)){
            $detalles = new Detalles;
            $detalles->codigo = request('codigo');
            $detalles->idc = $id_producto[$cont];
            $detalles->cantidad = $cantidad[$cont];
            $detalles->importe = $importe[$cont];
            if($id_encargado != 0){
                $detalles->descuento = $descuento[$cont];
            }
            $detalles->save();
            $cont = $cont+1;
        }
        $detalles = Ventas::join('detalles', 'ventas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('detalles.idc', 'productos.producto', 'productos.unidad', 'detalles.cantidad',  'detalles.importe')
                    ->where('ventas.codigo', '=', $codigo)
                    ->get();
        if($id_encargado == 0){ 
            return view('cliente.detalle')->with(["venta" => $preventas, 'detalle' => $detalles]);
        } else {
            return view('ventas.detalle')->with(["venta" => $preventas, 'detalle' => $detalles]);
        }        
        
    }

    public function verPreventa($id) {
        $venta  = Ventas::join('users', 'ventas.id_cliente', '=', 'users.id')
                    ->select('users.id', 'users.name As cliente', 'ventas.id As idv', 'ventas.codigo', 'ventas.created_at')
                    ->where('ventas.id', '=', $id)
                    ->get();
        $detalles  = Ventas::join('detalles', 'ventas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('ventas.id', 'ventas.codigo',
                    'detalles.idc', 'productos.descripcion', 'detalles.cantidad',
                    'productos.precio', 'detalles.importe')                    
                    ->where('ventas.id', '=', $id)
                    ->get();
        $total = Ventas::findOrFail($id);
        //return response()->json([ 'cliente' => $detallec, 'ventas' => $detallev]);
        return view('ventas.confirmar')->with([ 'cliente' => $venta, 'ventas' => $detalles, 'total' => $total]);
    }


    
    //Ventas - Preventas del Cliente
    public function createPCli() {
        $folio = \DB::select('SELECT MAX(id) As folio FROM ventas');
        $productos  = Productos::select('id', 'descripcion', 'unidad')->get();

        return view('preventas.preventa')
            ->with([
                'folio'     => $folio,
                'productos' => $productos
            ]);
    }    

    public function indexCli($id) {
        $preventas = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.codigo')
                    ->select('ventas.id', 'ventas.codigo', 'clientes.cliente', 'ventas.total', 'ventas.tipo', 'ventas.tipo_pago', 'ventas.estatus_pago')
                    ->where('ventas.id_cliente', '=', $id)
                    ->get();
        //return response()->json($preventas);
        return view('cliente.preventas')->with('preventas', $preventas);
    }

}
