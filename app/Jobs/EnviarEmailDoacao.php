<?php

namespace App\Jobs;

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

    protected $pedido;
    protected $flag;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($flag,$pedido)
    {
        $this->flag = $flag;
        $this->pedido = $pedido;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pedido->tipo_sanguineo_id = 1;

        $doadores = TipoSanguineo::match($this->pedido->tipo_sanguineo_id,$this->flag);

        foreach ($doadores as $doador)
        {
            Mail::to($doador->email)->send(new EmailPedido($this->pedido,$doador));
        }
    }
}
