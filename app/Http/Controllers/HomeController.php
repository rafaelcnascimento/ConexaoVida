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
        if (Auth::check()) 
        {
            return view('homeLogado');
            
        } 

        else 
        {
            //return view('home');
            $pedidos = Pedido::paginate(10);
            
            return view('pedidosListar', compact('pedidos'));
        }
    }

    public function comoFunciona()
    {    
        return view('home'); 
    }
}
