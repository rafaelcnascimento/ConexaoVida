<?php

namespace App\Http\Controllers\Auth;

// use \App\User;
// use \App\TipoSanguineo;
// use App\Estado;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $estados = \App\Estado::all();

        $tipos_sanguineos = \App\TipoSanguineo::all();

        return view('auth.register', compact('estados','tipos_sanguineos'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:12',
            'tipo_sanguineo_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            //'telefone' => 'nullable|required|min:10|max:15|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            'estado_id' => 'required|numeric',
            'ultima_doacao' => 'date_format:"d/m/Y"',
            'senha' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return \App\User::create([
            'nome' => $data['nome'],
            'genero' => $data['genero'],
            'tipo_sanguineo_id' => $data['tipo_sanguineo_id'],
            'email' => $data['email'],
            'telefone' => $data['telefone'],
            'ultima_doacao' => date('Y/m/d', strtotime($data['ultima_doacao'])),
            'cidade' => $data['cidade'],
            'estado_id' => $data['estado_id'],
            'senha' => Hash::make($data['senha']),
        ]);
    }
}
