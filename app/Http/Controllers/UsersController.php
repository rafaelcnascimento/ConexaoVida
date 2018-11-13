<?php

namespace App\Http\Controllers;

use Log;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        $estados = \App\Estado::all();

        $tipos_sanguineos = \App\TipoSanguineo::all();

        return view('dados', compact('estados','tipos_sanguineos','user'));
    }

    public function create()
    {
        $estados = \App\Estado::all();

        $tipos_sanguineos = \App\TipoSanguineo::all();

        return view('auth.register', compact('estados','tipos_sanguineos'));
    }

    public function password()
    {
        return view('auth.mudarSenha');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'senha_atual' => 'required|string|min:6|',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (Hash::check($request->senha_atual, $user->password))
        { 
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Senha modificada com sucesso');
            
            return redirect('/mudar-senha');
        } 
        else 
        {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'A senha atual está incorreta');
            
            return redirect('/mudar-senha');
        }
    }

    protected function update(User $user, Request $request)
    {
        $request->validate([
            'nome' =>  'required|regex:/^[\pL\s\-]+$/u|max:255',
            'tipo_sanguineo_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'telefone' => 'digits_between:10,11|required',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            // 'estado_id' => 'required|numeric',
        ]);

        $user->update($request->all());

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Informações modificadas com sucesso');

        return redirect('/meus-dados');
    }

    protected function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'tipo_sanguineo_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'telefone' => 'digits_between:10,11|required',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            // 'estado_id' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $dados = $request->except('password_confirmation');

        $dados['password'] = Hash::make($request->password);

        User::create($dados);

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Conta criada com sucesso');

        return redirect('/login');
    }

    //Funcões API
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    public function apiCreate()
    {
        $estados = Estado::all();

        return response()->json($estados, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    protected function apiStore(Request $request)
    {
        $dados = $request->all();

        $dados['password'] = Hash::make($request->password);

        User::create($dados);

       return response()->json($request, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    protected function apiUpdate(User $user, Request $request)
    {
        $user->update($request->all());

        return response()->json(200);
    }

    protected function apiUpdateSenha(User $user, Request $request) 
    {
        $user->password = Hash::make($request->password);

        $user->save();

        return response()->json(200);
    }
}


// urlConnection.setRequestMethod("POST");

//                 BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(urlConnection.getOutputStream(), "UTF-8"));
//                 bw.write(jason.toString());
//                 bw.flush();
//                 bw.close();
