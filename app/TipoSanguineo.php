<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Compatibilidade;

class TipoSanguineo extends Model
{
    protected $table = 'tipos_sanguineos';

    public static function match($tipo, $flag)
    {
        if (!$flag) 
        {
            $compativeis = Compatibilidade::where('receptor_id',$tipo)->pluck('doador_id');

            $doadores = User::where('recebe_email',true)->whereIn('tipo_sanguineo_id',$compativeis)->get();
        } 
        else
        {
            $doadores = User::where('recebe_email',true)->where('tipo_sanguineo_id',$tipo)->get();
        }

        return $doadores;
    }

    public function doadores($tipo)
    {
        $doadores = Compatibilidade::where('receptor_id',$tipo)->get();

        return $doadores;
    }

    public static function receptores($tipo)
    {
        $receptores = Compatibilidade::where('doador_id',$tipo)->get();

        return $receptores;
    }

}
