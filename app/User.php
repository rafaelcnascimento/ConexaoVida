<?php

namespace App;

use Auth;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $dates = ['ultima_doacao'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sangue()
    {
        return $this->belongsTo('App\TipoSanguineo','tipo_sanguineo_id');
    }

    public static function getNome()
    {
        $nome_completo =  explode(' ', Auth::user()->nome);

        return $nome_completo[0];
    }

    public static function getFone() 
    {
        $telefone = Auth::user()->telefone;

        if (strlen($telefone) == 11) 
        {
            $telefone = substr_replace($telefone, '(', 0, 0);
            $telefone = substr_replace($telefone, ') ', 3, 0);
            $telefone = substr_replace($telefone, '-', 10, 0);
        } 
        else 
        {
            $telefone = substr_replace($telefone, '(', 0, 0);
            $telefone = substr_replace($telefone, ') ', 3, 0);
            $telefone = substr_replace($telefone, '-', 9, 0);
        }

        return $telefone;
    }

    public static function getData() 
    {
        $data = Auth::user()->ultima_doacao;

        if (!strcmp(Auth::user()->genero, 'masculino')) 
        {
            $data->add(new DateInterval('P2M'));
        }    
        else 
        {
            $data->add(new DateInterval('P4M'));
        }

        return $data;
    }

    public static function formatDate($value)
    {
        $date = Carbon::createFromFormat('d/m/Y', $value);
        
        return $date->format('Y-m-d');
    }

}

