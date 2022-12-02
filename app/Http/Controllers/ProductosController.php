<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use PDF;

class ProductosController extends Controller {

    public function sitioIndex(){
        $productos = Productos::all();
        return view('sitio.productos')->with(['productos' => $productos]);
    }
    
    public function index() {
        $productos = Productos::all();
        return view('productos.listado')->with(['productos' => $productos]);
    }    

    
    public function create() {
        return view('productos.create');
    }

    
    public function store(Request $request) {
        //dd($request);
        $request->validate([
            'producto'=>'required|max:50',
            'descripcion'=>'required|max:200',
            'precio'=>'required|max:50'
        ]);
        $guardar = new Productos;
        $guardar->producto = $request->get('producto');
        $guardar->descripcion = $request->get('descripcion');
        $guardar->unidad = $request->get('unidad');
        $guardar->precio = $request->get('precio');
        $guardar->tipo = $request->get('tipo');
        if($request->hasFile('foto')){
            $file = $request->foto;
            $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
            $guardar->foto = $file->getClientOriginalName();
        }
        $guardar->save();
        $status = 'Producto Registrado Correctamente';
        return redirect('productos/')->with(compact('status'));
        
    }    
    
    public function show($id) {
        $producto = Productos::findOrFail($id);
        return view('productos.update')->with(['detalles' => $producto]);
    }    
    
    public function update(Request $request, $id) {
        //dd($request);
        
        $producto = Productos::find($id);
        $producto->producto = $request->get('producto');
        $producto->descripcion = $request->get('descripcion');
        $producto->unidad = $request->get('unidad');
        $producto->precio = $request->get('precio');
        $producto->tipo = $request->get('tipo');        
        if($request->hasFile('foto')){
            $file = $request->foto;
            $file->move(public_path(). '/img/productos', $file->getClientOriginalName());
            $producto->foto = $file->getClientOriginalName();
        }        
        $producto->update();
        $status = 'Se Modifico El Producto Correctamente';
        return redirect('productos/')->with(compact('status'));
    }

    
    public function destroy($id) {
        Productos::destroy($id);
        return redirect('productos/');
    }

    
}
