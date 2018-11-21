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

    public function ajuda()
    {    
        return view('ajuda'); 
    }
   
    public function sobre()
    {    
        return view('sobre'); 
    }

}
