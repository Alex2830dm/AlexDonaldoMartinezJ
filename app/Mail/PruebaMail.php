<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PruebaMail extends Mailable
{
    use Queueable, SerializesModels;
    public $message;
    public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message) {
        $this->msg = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        return $this->subject('Comprobante de Venta')->view('emails.pruebaEmail')
        ->attach($this->msg['archivo']->getRealPath(), [
            'as'=>$this->msg['archivo']->getClientOriginalName()
        ]);
    }
}
