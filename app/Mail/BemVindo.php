<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BemVindo extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->subject("Bem vindo ao Conexão Vida")->view('email.welcome');
    }
}
