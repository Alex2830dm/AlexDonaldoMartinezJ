<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Productos;
use App\Models\Detalles;
use App\Models\Entradas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EntradasController extends Controller
{
    public function index(){
        $entradas = Entradas::join('users', 'entradas.id_encargado', '=', 'users.id')
                    ->select('entradas.id', 'entradas.codigo', 'entradas.id_encargado', 'users.name', 'entradas.created_at')->get();
        return view('entradas.listado')->with('entradas', $entradas);
    }
    public function list(){
        $folio = \DB::select('SELECT MAX(id) As folio FROM entradas');
        $productos  = Productos::select('id', 'descripcion', 'unidad')->get();

        return view('entradas.entradas')
            ->with([
                'folio'     => $folio,
                'productos' => $productos
            ]);                 
    }
    public function store(Request $request){
        //dd($request);
        $fecha = Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s');
        $entradas = new entradas;
        $entradas->id_encargado = request('id_encargado');
        $entradas->codigo = request('codigo');
        $entradas->created_at = $fecha;
        $entradas->save();

        $idproducto = $request->get('id_producto');
        $cantidad = $request->get('cantidad');
        $codigo = request('codigo');
        
    
        //dd($idproducto);
        $cont = 0;
        while($cont < count($idproducto)){
            $stock = Productos::where('id', $idproducto[$cont])->increment('cantidad', $cantidad[$cont]);
            $detalles = new Detalles;
            $detalles->codigo = request('codigo');
            $detalles->idc = $idproducto[$cont];
            $detalles->cantidad = $cantidad[$cont];
            $detalles->save();
            $cont = $cont+1;
        }
        $stock = Entradas::join('detalles', 'entradas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('detalles.idc', 'productos.producto', 'productos.unidad', 'productos.cantidad AS stock', 'detalles.cantidad')
                    ->where('entradas.codigo', '=', $codigo)
                    ->get();
        //return redirect('entradas/');
        return view('entradas.detalle')->with(["entrada" => $entradas, 'stock' => $stock]);
    }
    public function show($id) {
        $fecha = Entradas::join('users', 'entradas.id_encargado', '=', 'users.id')
                ->select('entradas.created_at', 'entradas.id_encargado', 'users.name')->where('entradas.id', '=', $id)->get();
        $detallent  = DB::table('entradas')
                    ->join('detalles', 'entradas.codigo', '=', 'detalles.codigo')
                    ->join('productos', 'detalles.idc', '=', 'productos.id')
                    ->select('entradas.id', 'entradas.codigo', 'detalles.idc', 'productos.descripcion', 'detalles.cantidad', 'productos.unidad',
                            'detalles.importe')
                    ->where('entradas.id', '=', $id)
                    ->get();
        $total = Entradas::find($id);
        //return response()->json([ 'cliente' => $detallec, 'ventas' => $detallev]);
        return view('entradas.detalles')->with(['fecha' => $fecha, 'entradas' => $detallent, 'total' => $total]);
    }

}
