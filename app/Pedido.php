<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Compatibilidade;
use Auth;

class Pedido extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    public function requerente()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function sangue()
    {
        return $this->belongsTo('App\TipoSanguineo','tipo_sanguineo_id');
    }

    public function regiao()
    {
        return $this->belongsTo('App\Regiao','regiao_id');
    }

    public function doadores()
    {
        $sangue = $this->tipo_sanguineo_id;

        $doadores = Compatibilidade::where('receptor_id',$sangue)->get();

        return $doadores;
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
