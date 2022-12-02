<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Unidades;
use App\Models\Ventas;
use Carbon\Carbon;
use App\Models\Materia_Prima;
use App\Models\Compras;
use App\Models\User;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DocumentosImport;
use App\Imports\ClientesImport;
use App\Imports\RutasImport;
use App\Exports\ProductosExport;
use App\Exports\ProductosVistaExport;
use App\Exports\ClientesExport;

class DocumentosController extends Controller {

    public function UsersPdf(){
        $usuarios = User::all();
        $pdf = PDF::loadView('usuarios.pdf', ['usuarios' => $usuarios]);
        //return $pdf->stream();
        return $pdf->download('Personal_Frefrigel.pdf');
    }
    
    public function Productospdf() {
        /* $productos = Productos::join('unidades', 'productos.unidad', '=', 'unidades.id')
                    ->select('productos.producto', 'productos.cantidad', 'unidades.nombre AS uni')->get(); */

        $productos = Productos::select('producto', 'descripcion', 'cantidad', 'unidad As uni')->get();
        $pdf = PDF::loadView('productos.pdf', ['productos' => $productos]);        
        return $pdf->download('Inventario_Productos_Frefrigel.pdf');
    }

    public function ComprobanteVentaPdf($codigo) {
        //dd($codigo);
        $cliente = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                ->join('rutas', 'clientes.ruta', '=', 'rutas.id')
                ->select('clientes.*', 'rutas.ruta AS rutas')->where('ventas.codigo', '=', $codigo)->get();
        $venta1 = Ventas::join('users', 'ventas.id_encargado', '=', 'users.id')
                ->select('users.name As encargado', 'ventas.*')
                ->where('ventas.codigo', '=', $codigo)->get();
        $venta2 = Ventas::where('codigo', '=', $codigo)->get();
        $detalles_venta = Ventas::join('detalles', 'ventas.codigo', '=', 'detalles.codigo')
                ->join('productos', 'detalles.idc', '=', 'productos.id')
                ->select('productos.producto', 'productos.descripcion', 'detalles.cantidad', 'detalles.descuento', 'productos.precio','detalles.importe')
                ->where('ventas.codigo', '=', $codigo)->get();
        //return response()->json($venta);
        $pdf = PDF::loadView('ventas.comprobante', ['cliente' => $cliente, 'venta1' => $venta1, 'venta2' => $venta2, 'detalles' => $detalles_venta]);        

        $now = Carbon::now('America/Mexico_City')->format('Y-m-d');
        $cliente = Ventas::join('clientes', 'ventas.id_cliente', '=', 'clientes.id')
                ->select('clientes.cliente')->where('ventas.codigo', '=', $codigo)->get();
        $nombre = "Comprobante_Venta_$now.pdf";
        return $pdf->download($nombre);
    }
    
    public function importProductos(Request $request){        
        Excel::import(new DocumentosImport, request()->file('import'));
        return redirect()->to('productos/');
    }

    public function exportProductos(){
        return Excel::download(new ProductosVistaExport, 'Productos.xlsx');
        /* $productos = Productos::all();
        return view('exports.productos')->with(['productos' => $productos]); */
    }

    public function importClientes(Request $request){
        Excel::import(new ClientesImport, request()->file('import'));
        return redirect()->to('clientes/');
    }

    public function exportClientes(){
        return Excel::download(new ClientesExport, 'Clientes.xlsx');
    }

    public function importRutas(Request $request){
        Excel::import(new RutasImport, request()->file('import'));
        return redirect()->to('clientes/rutas');
    }

    public function export()  {
        Excel::download(new InvoicesExport, 'invoices.xlsx');
        return redirect()->to('productos/')->with('estatus', 'Se ha descargado el archivo correctamente');
    }
}
