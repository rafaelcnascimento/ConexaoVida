<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use Auth;
use Log;
use App\TipoSanguineo;
use App\Regiao;
use App\Jobs\EnviarEmailDoacao;
use Response;

class PedidosController extends Controller
{
    public function index()
    {
        if (!is_null(Auth::user())) 
        {    
            if (Auth::user()->role_id == 1) 
            {
              $users = User::orderBy('nome','asc')->paginate(10);
                  
              return view('usersListar', compact('users'));
            } 

            else
            {
               $pedidos = Pedido::where('regiao_id',Auth::user()->regiao_id)->orderBy('id', 'desc')->paginate(10);
                   
               return view('pedidosListarLogado', compact('pedidos'));
            } 
        }
        else
        {
            $pedidos = Pedido::orderBy('id', 'desc')->paginate(10);
                
            return view('pedidosListar', compact('pedidos'));
        }
    }

    public function indexUser()
    {
        $pedidos = Pedido::where('user_id',Auth::user()->id)->paginate(10);
        
        return view('meusPedidosListar', compact('pedidos'));
    }

    public function show(Pedido $pedido)
    {
        return view('pedidoShow', compact('pedido'));
    }

    public function edit(Pedido $pedido)
    {
        $regioes = Regiao::all();

        $tipos_sanguineos = TipoSanguineo::all();

        return view('pedidoEdit', compact('regioes','tipos_sanguineos','pedido'));
    }

    public function delete(Pedido $pedido, Request $request)      
    {
        $pedido->delete();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Pedido removido com sucesso');

        return redirect()->back();
    }

    public function deleted()
    {
        if (Auth::user()->role_id == 1) 
        {
            $pedidos = Pedido::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
        }
        
        else
        {
            $pedidos = Pedido::onlyTrashed()->where('user_id',Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        }        
        
        return view('lixeira', compact('pedidos'));
    }

    public function restore($pedido_id, Request $request)
    {
        Pedido::withTrashed()->find($pedido_id)->restore();

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Pedido recuperado com sucesso');

        return redirect('/lixeira');
    }

    public function create()
    {
        $regioes = Regiao::all();

        $tipos_sanguineos = TipoSanguineo::all();

        return view('pedidoCadastro', compact('regioes','tipos_sanguineos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'hospital' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
            'quarto' => 'required|numeric|max:255',
            'endereco_hospital' => 'required|string|max:255',
            'tipo_sanguineo_id' => 'required|numeric',
            'cidade' => 'required|min:1|max:150|regex:/^[\pL\s\-]+$/u',
            // 'estado_id' => 'required|numeric',
        ]);

        $dados = request()->all();

        if (isset($dados['exclusivo'])) {
            $dados['exclusivo'] = 1;
        } else $dados['exclusivo'] = 0;

        $pedido = Pedido::create($dados);

        // $doadores = TipoSanguineo::match($pedido->tipo_sanguineo_id,$request->exclusivo);

        // dd($doadores);

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Pedido criado com sucesso');

        return redirect('/');
    }

    protected function update(Pedido $pedido, Request $request)
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

        $dados = request()->all();

        if (isset($dados['exclusivo'])) {
            $dados['exclusivo'] = 1;
        } else $dados['exclusivo'] = 0;

        $pedido->update($dados);

        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Pedido editado com sucesso');

        return redirect()->back();
    }

    //Rotas da API
    public function apiIndex()
    {
        $pedidos = Pedido::paginate(10);
        
        return response()->json($pedidos, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    public function apiShow(Pedido $pedido)
    {
        return response()->json($pedido, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    public function apiCreate()
    {
        $regioes = Regiao::all();

        $tipos_sanguineos = TipoSanguineo::all();

        return Response::json(array(
            'regioes' => $regioes,
            'tipos_sanguineos' => $tipos_sanguineos
        ));
    }

    public function apiStore(Request $request)
    {
        $pedido = Pedido::create(request()->all());

        // foreach ($doadores as $doador)
        // {
        //     Mail::to($doador->email)->send(new EmailPedido($pedido,$doador));
        // }

        return response()->json(200);
    }

}
