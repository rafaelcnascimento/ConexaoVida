<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailPedido extends Mailable
{
    use Queueable, SerializesModels;

    public $pedido;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pedido,$user)
    {   
        $this->pedido = $pedido;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Precisamos da sua doação")->view('email.pedido');
    }
}
