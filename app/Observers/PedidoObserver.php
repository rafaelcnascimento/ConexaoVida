<?php

namespace App\Observers;

use App\Pedido;
use Mail;
use App\Mail\EmailPedido;
use App\TipoSanguineo;

class PedidoObserver
{
    /**
     * Handle the pedido "created" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function created(Pedido $pedido)
    {
        $doadores = TipoSanguineo::match($pedido->tipo_sanguineo_id,$pedido->regiao_id,$pedido->exclusivo);

        foreach ($doadores as $doador)
        {
            Mail::to($doador->email)->send(new EmailPedido($pedido, $doador));
        }
    }

    /**
     * Handle the pedido "updated" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function updated(Pedido $pedido)
    {
        
    }

    /**
     * Handle the pedido "deleted" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function deleted(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the pedido "restored" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function restored(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the pedido "force deleted" event.
     *
     * @param  \App\Pedido  $pedido
     * @return void
     */
    public function forceDeleted(Pedido $pedido)
    {
        //
    }
}
