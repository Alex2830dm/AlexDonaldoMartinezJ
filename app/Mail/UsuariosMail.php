<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsuariosMail extends Mailable
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
        return $this->subject('Bienvenido a Frefriel')->view('emails.bienvenida');
    }
}
