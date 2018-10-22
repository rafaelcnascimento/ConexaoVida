<?php

namespace App\Jobs;

use Log;
use Mail;
use App\Mail\EmailPedido;
use App\TipoSanguineo;
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
    public function __construct($pedido,$doadores)
    {
        $this->pedido = $pedido;
        $this->$doadores = $doadores;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info(print_r($this->pedido, true));
        Log::info(print_r($this->doadores, true));

        // foreach ($this->doadores as $doador)
        // {
        //     Mail::to($doador->email)->send(new EmailPedido($this->pedido,$doador));
        // }
    }
}
