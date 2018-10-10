<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compatibilidade extends Model
{
    public $timestamps = false;

    public function doadores()
    {
        return $this->belongsTo('App\TipoSanguineo','doador_id');
    }
}
