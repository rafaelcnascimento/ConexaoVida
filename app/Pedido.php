<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];

    public function requerente()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function sangue()
    {
        return $this->belongsTo('App\TipoSanguineo','tipo_sanguineo_id');
    }
}
