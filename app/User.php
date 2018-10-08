<?php

namespace App;

use Auth;
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

}

