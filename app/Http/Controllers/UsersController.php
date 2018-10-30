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

    protected function update(User $user, Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_sanguineo_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            //'telefone' => 'nullable|required|min:10|max:15|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            // 'estado_id' => 'required|numeric',
        ]);

        $user->update($request->all());

        return redirect('/meus-dados');
    }

    protected function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_sanguineo_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            //'telefone' => 'nullable|required|min:10|max:15|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            // 'estado_id' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $dados = $request->except('password_confirmation');

        $dados['password'] = Hash::make($request->password);

        User::create($dados);

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

        return response()->json($estados,200);
    }

    protected function apiStore(Request $request)
    {
        $dados = $request->all();

        $dados['password'] = Hash::make($request->password);

        User::create($dados);

       return response()->json(200);
    }

    protected function apiUpdate(User $user, Request $request)
    {
        // $request->validate([
        //     'nome' => 'required|string|max:255',
        //     'tipo_sanguineo_id' => 'required|numeric',
        //     'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        //     //'telefone' => 'nullable|required|min:10|max:15|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
        //     'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
        //     // 'estado_id' => 'required|numeric',
        // ]);
        $user->update($request->all());

        return response()->json(200);
    }
}
