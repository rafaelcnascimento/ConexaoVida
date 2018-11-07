<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

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

    public function criadoPor()
    {
        $user = Auth::user();
        
        if (is_null($user))
        {
            return false;
        }

        if ($this->user_id == $user->id) 
        {
            return true;    
        } else {
            return false;
        }
    }

}
