<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pedido;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $pedidos = Pedido::paginate(10);
            
        return view('pedidosListar', compact('pedidos'));
    }

    public function comoFunciona()
    {    
        return view('home'); 
    }
   
    public function sobre()
    {    
        return view('sobre'); 
    }

}
