<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clientes;
use App\Models\Productos;
use App\Models\User;
use App\Models\Rutas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ComprobantesMail;

class ClientesController extends Controller
{
    public function index() {
        $clientes = Clientes::join('rutas', 'clientes.ruta', '=', 'rutas.id')
                    ->select('clientes.*', 'rutas.ruta AS rl')->get();
        //return response()->json(['Clientes'=>$clientes]);
        //$clientes = Clientes::all();
        return view('clientes.listado')->with('clientes', $clientes);
    }

    public function list() {
        $clientes = Clientes::all();
        $productos = Productos::all();
        //return response()->json(['Clientes'=>$clientes]);
        return view('ventas.ventas')
                ->with('clientes', $clientes)
                ->with('productos', $productos);
    }
    
    public function create() {
        $rutas = Rutas::all();
        $folio = \DB::select('SELECT MAX(id) as folio FROM clientes');
        return view('clientes.create')->with(['rutas' => $rutas, 'folio' => $folio]);
     }
 
    public function store(Request $request) {
        //dd($request);
        $request->validate([
            'cliente' => 'required|max:60',
            'telefono' => 'required|max:12',
            'email' => 'required',
            'd_calle' => 'required|max:60',
            'd_colonia' => 'required|max:50',
            'd_municipio' => 'required|max:40'
        ]);
        $cli_sto = Clientes::create($request->all());
        //return response()->json($cli_sto);

        $cliente = new User;
        $cliente->name = $request->get('cliente');
        $cliente->representate = $request->get('representante');
        $cliente->codigo = $request->get('codigo');
        $cliente->email = $request->get('email');
        $cliente->password = "Frefrigel123";
        $cliente->tipo_usuario = "2";
        $cliente->save();

        return redirect('clientes/');
    }
    
 
    public function show($id) {
        $detalles = Clientes::findOrFail($id);
        $rutas = Rutas::all();
        //return response()->json($detalles);
        return view('clientes.editar')->with(['detalle' => $detalles, 'rutas' => $rutas]);
    }
 
    public function edit(Clientes $clientes) {
         //
    }
 
    public function update(Request $request, $id) {
        $cliente = Clientes::findOrFail($id)->update($request->all());
        return redirect('clientes/');        
    }
 
    public function destroy($id) {
        Clientes::destroy($id);
        return redirect('clientes/');
    }


    public function rutas(){
        $rutas = Rutas::all();
        return view('clientes.rutas')->with(['rutas' => $rutas]);
    }
    public function guardarR(Request $request) {
        //dd($request);
        $ruta = Rutas::create($request->all());
        return redirect()->to('clientes/nuevo');
    }

    public function enviarComprobante(){
        $clientes = Clientes::select('id', 'cliente')->get();
        return view('emails.ComprobanteVenta')->with(['clientes' => $clientes]);
    }

    public function sendComprobante(Request $request){
        $message = [
            'email' => $request->email,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'archivo' => $request->file('archivo')
        ];
        Mail::to($message['email'])->send(new ComprobantesMail($message));
        return redirect()->to('clientes/enviar_comprobante/')->with('estatus', 'Correo Enviado Correctamente');
    }


    //Funciones para el cliente
    public function sitio() {
        /* $productos = Productos::all();
        return view('cliente.productos')->with(['productos' => $productos]); */
        return view('cliente.sitio');
    }

    public function productos() {

        $productos = Productos::all();
        return view('cliente.productos')->with(['productos' => $productos]);
    }

    public function preventa() {
        $folio = \DB::select('SELECT MAX(id) As folio FROM ventas');
        $productos  = Productos::select('id', 'descripcion', 'unidad')->get();

        return view('cliente.preventa')
            ->with([
                'folio'     => $folio,
                'productos' => $productos
            ]);
    }

    public function contacto(){
        return view('cliente.contacto');
    }
}
