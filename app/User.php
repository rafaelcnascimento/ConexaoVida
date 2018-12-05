<?php

namespace App;

use Auth;
use Mail;
use App\Mail\ResetarSenha;
use Carbon\Carbon;
use DateInterval;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function sangue()
    {
        return $this->belongsTo('App\TipoSanguineo','tipo_sanguineo_id');
    }

    public function regiao()
    {
        return $this->belongsTo('App\Regiao','regiao_id');
    }

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
    }

    public function getNome()
    {
        $nome_completo =  explode(' ', $this->nome);

        return $nome_completo[0];
    }

    public function getFone() 
    {
        $telefone = $this->telefone;

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

    public function sendPasswordResetNotification($token)
    {
        $user = User::where('email',request()->email)->first();

        Mail::to($user->email)->send(new ResetarSenha($token,$user));
    }
}

