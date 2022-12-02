<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Clientes;

class JQueryController extends Controller {
    public function datos01(Request $request){
        //dd($request);
        $id = $request->get('id');
        
        //$materia = MateriasPrimas::find($id);
        $datos = Productos::select('producto', 'precio', 'unidad')
                    ->where('productos.id', '=', $id)->get();
        //dd($datos);

        return view("datos/datos01")->with(['datos' => $datos]);
    }   
    public function datos02(Request $request){
        //dd($request);
        $id = $request->get('id');
        
        //$materia = MateriasPrimas::find($id);
        $datos = Productos::select('producto', 'precio', 'unidad')
                    ->where('productos.id', '=', $id)->get();
        //dd($datos);

        return view("datos/datos02")->with(['datos' => $datos]);
    }
    public function datos03(Request $request){
        //dd($request);
        $id = $request->get('id');
        
        //$materia = MateriasPrimas::find($id);
        $datos = Productos::select('producto', 'foto')
                    ->where('productos.id', '=', $id)->get();
        //dd($datos);

        return view("datos/datos03")->with(['datos' => $datos]);
    }    
    public function datos_entradas(Request $request){
        //dd($request);
        $id = $request->get('id');
        
        //$materia = MateriasPrimas::find($id);
        $datos = Productos::select('producto', 'precio', 'unidad')
                    ->where('productos.id', '=', $id)->get();
        //dd($datos);

        return view("datos/datos_entrada")->with(['datos' => $datos]);
    }
    public function datos04(Request $request){
        $id_cliente = $request->get('id_cliente');
        $cliente = Clientes::findOrFail($id_cliente);
        //dd($cliente);
        return view("datos/datos_cliente")->with(['cliente'=> $cliente]);
    }

    public function js02(Request $request) {
        dd($request);   
    }
    
}
