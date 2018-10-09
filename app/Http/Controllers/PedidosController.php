<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidosController extends Controller
{
    public function create()
    {
        $estados = \App\Estado::all();

        $tipos_sanguineos = \App\TipoSanguineo::all();

        return view('pedidoCadastro', compact('estados','tipos_sanguineos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente' => 'required|string|max:255',
            'hospital' => 'required|string|max:255',
            'quarto' => 'required|string|max:255',
            'endereco_hospital' => 'required|string|max:255',
            'tipo_sanguineo_id' => 'required|numeric',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            // 'estado_id' => 'required|numeric',

        ]);

        Pedido::create(request()->all());

        return redirect('/');
    }
}
