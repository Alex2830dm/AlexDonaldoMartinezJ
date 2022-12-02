<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller {

    public function index(){
        return view('auth.login');
    }
    public function store() {
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectos'
            ]);
        }
        return redirect()->to('ventas');
    }
    public function logout(){
        auth()->logout();
        return redirect()->to('/');
    }

    public function login(Request $request){
        if(!Auth::attempt($request->only('email', 'password'))){
            $result = [
                'user' => null,
                'access_token' => null,
                'token_type' => null,
                'message' => 'Credenciales no validas',
                'success' => false,
                'status' => 200
            ];
            return response()->json([
                'result' => [$result],
            ], 200);
        }else{
            $user = User::where('email', $request['email'])->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;
            $result = [
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'message' => 'Credenciales validas',
                'success' => true,
                'status' => 200
            ];
            return response()->json([
                'result' => [$result],
            ], 200);
        }
    }
    
    public function mi_perfil() {
        return view('perfil');
    }

    public function actulizar_datos($id){
        $perfil = User::findOrFail($id);
        //return response()->json($perfil);
        return view('update')->with(['datos' => $perfil]);
    }

    public function update_datos(Request $request, $id){
        $perfil = User::find($id);
        $perfil->name = $request->get('name');
        $perfil->app = $request->get('app');
        $perfil->apm = $request->get('apm');
        $perfil->update();
        return redirect('mi_perfil');
    }

    public function foto_perfil(Request $request, $id){
        $request->validate([
            'foto'=>'required'
        ]);
        $perfil = User::find($id);
        if($request->hasFile('foto')){
            $file = $request->foto;
            $file->move(public_path(). '/img/perfil', $file->getClientOriginalName());
            $perfil->foto = $file->getClientOriginalName();
        }
        $perfil->update();   
        return redirect('mi_perfil');
    }

    public function logueo() {
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo o la contraseña son incorrectos'
            ]);
        }
        return redirect()->to('ventas');
    }
}
