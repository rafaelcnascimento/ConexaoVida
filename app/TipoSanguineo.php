<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Compatibilidade;

class TipoSanguineo extends Model
{
    protected $table = 'tipos_sanguineos';

    public static function match($tipo)
    {
        $compativeis = Compatibilidade::where('receptor_id',$tipo)->pluck('doador_id');

        $doadores = User::whereIn('tipo_sanguineo_id',$compativeis)->get();

        return $doadores;
    }
}
