<?php

namespace App\Jobs;

use Mail;
use App\Mail\EmailPedido;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EnviarEmailDoacao implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $pedido;
    public $doadores;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($doadores,$pedido)
    {
        $this->doadores = $doadores;
        $this->pedido = $pedido;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($doadores as $doador)
        {
            Mail::to($doador->email)->send(new EmailPedido($pedido,$doador));
        }
    }
}
