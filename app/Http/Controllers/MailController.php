<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PruebaMail;

class MailController extends Controller {
    
    public function formEmail(){
        return view('emails.formulario');
    }
    
    public function sendEmail(Request $request){
        $message = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'asunto' => $request->asunto,
            'contenido' => $request->contenido,
            'archivo' => $request->file('archivo')
        ];

        $details = [
            'title' => $request->get('asunto'),
            'body' => $request->get('mensaje')
        ];

        //Mail::to("alex.chokis.28@gmail.com")->send(new PruebaMail($details));
        //Mail::to($request->get('email'))->send(new PruebaMail($details));
        Mail::to($message['email'])->send(new PruebaMail($message));
        return "Correo Electronico Enviado Exitosamente";
    }
}
