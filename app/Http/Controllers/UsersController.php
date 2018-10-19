<?php

namespace App\Http\Controllers;

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
            'genero' => 'required|string|max:12',
            'tipo_sanguineo_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            //'telefone' => 'nullable|required|min:10|max:15|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            'ultima_doacao' => 'date_format:"d/m/Y"',
            // 'estado_id' => 'required|numeric',
        ]);

        $dados = $request->all();

        $dados['ultima_doacao'] = User::formatDate($request->ultima_doacao);

        // dd($dados);

        $user->update($dados);

        return redirect('/meus-dados');
    }

    protected function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|string|max:12',
            'tipo_sanguineo_id' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            //'telefone' => 'nullable|required|min:10|max:15|regex:/^[0-9]+[-]*[0-9]+[-]*[0-9]+$/u',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            // 'estado_id' => 'required|numeric',
            'ultima_doacao' => 'date_format:"d/m/Y"',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nome' => $request->nome,
            'genero' => $request->genero,
            'tipo_sanguineo_id' => $request->tipo_sanguineo_id,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'ultima_doacao' => date('Y-m-d', strtotime($request->ultima_doacao)),
            'cidade' => $request->cidade,
            // 'estado_id' => $request->estado_id,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login');
    }

    public function donate()
    {
        $user = Auth::user();

        $data = $user->getData();

        $hoje = Carbon::now();

        if ($hoje > $data)
        {
           $user->update([
            'ultima_doacao' => $hoje
            ]);
        }

        else
        {
            echo "nao";
        }

        return redirect('/');
        
    }

    //Rotas API
    public function apiCreate()
    {
        $estados = Estado::all();

        return response()->json($estados,200);
    }

    protected function apiStore(Request $request)
    {
        User::create([
            'nome' => $request->nome,
            'genero' => $request->genero,
            'tipo_sanguineo_id' => $request->tipo_sanguineo_id,
            'email' => $request->email,
            'telefone' => $request->telefone,
            // 'ultima_doacao' => date('Y/m/d', strtotime($request->ultima_doacao)),
            'ultima_doacao' => $request->ultima_doacao,
            'cidade' => $request->cidade,
            // 'estado_id' => $request->estado_id,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(201);
    }
}
