<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UsuariosMail;


class UsersController extends Controller {
    
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $request->validate([
            'name'  => 'required',
            'email'  => 'required',
            'password'  => 'required',
            'tipo_usuario'  => 'required',
        ]);
        $user = User::create($request->all());
        $message = [
            'name'  => $request->name,
            'email'  => $request->email,
            'password'  => $request->password,
            'tipo_usuario'  => $request->tipo_usuario
        ];
        Mail::to($message['email'])->send(new UsuariosMail($message));
        return redirect()->to('usuarios/')->with('estatus', 'Usuario Registrado Correctamente');
    }

    public function list() {
        $usuarios = User::all()->where('activo', 1);
        return view('usuarios.listado')->with('usuarios', $usuarios);
    }

    public function detalles($id){
        $usuario = User::find($id);
        //return response()->json(['usuario' => $usuario]);
        return view('usuarios.editar')->with('detalles', $usuario);
    }

    public function update($id, Request $request){
        //dd($request);
        $user = User::find($id)->update($request->all());

        //Auth()->login($user);
        //return redirect()->to('/');
        //return response()->json(['Usuario' => $user]);
        return redirect()->to('usuarios/');
    }
    public function destroy($id){
        User::destroy($id);
        return redirect('usuarios/');
    }

    public function inactivos(){
        $usuarios = User::all()->where('activo', 0);
        return view('usuarios.inactivos')->with('usuarios', $usuarios);
    }

    public function inactivo($id){
        $usuario = User::find($id);
        $usuario->activo = 0;
        $usuario->update();        
        return redirect('usuarios/');
    }
    public function activo($id){
        $usuario = User::find($id);
        $usuario->activo = 1;
        $usuario->update();        
        return redirect('usuarios/');
    }    

}
