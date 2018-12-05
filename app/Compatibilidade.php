<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compatibilidade extends Model
{
    public $timestamps = false;

    protected $fillable = [];

    public function sangue()
    {
        return $this->belongsTo('App\TipoSanguineo','doador_id');
    }
}
