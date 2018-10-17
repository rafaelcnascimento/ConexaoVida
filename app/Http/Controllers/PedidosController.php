<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\TipoSanguineo;
use App\Estado;
use App\Jobs\EnviarEmailDoacao;
use Response;

class PedidosController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::paginate(10);
        
        return view('pedidosListar', compact('pedidos'));
    }

    public function show(Pedido $pedido)
    {
        return view('pedidoShow', compact('pedido'));
    }

    public function create()
    {
        $estados = Estado::all();

        $tipos_sanguineos = TipoSanguineo::all();

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

        $pedido = Pedido::create(request()->all());

        dispatch(new EnviarEmailDoacao($request->check_exclusivo,$pedido));

        return redirect('/');
    }

    //Rotas da API
    public function apiIndex()
    {
        $pedidos = Pedido::paginate(10);
        
        return response()->json($pedidos, 200);
    }

    public function apiShow(Pedido $pedido)
    {
        return response()->json($pedido, 200);
    }

    public function apiCreate()
    {
        $estados = Estado::all();

        $tipos_sanguineos = TipoSanguineo::all();

        return Response::json(array(
            'estados' => $estados,
            'tipos_sanguineos' => $tipos_sanguineos
        ));
    }

    public function apiStore(Request $request)
    {
        $pedido = Pedido::create(request()->all());

        foreach ($doadores as $doador)
        {
            Mail::to($doador->email)->send(new EmailPedido($pedido,$doador));
        }

        return response()->json(201);
    }

}
