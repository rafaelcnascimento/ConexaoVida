<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pedido;
use Auth;

class HomeController extends Controller
{

    public function index()
    {    
        return redirect('/doacoes');
    }

    public function redirect()
    {
        if (Auth::user()->role_id == 1) 
        {
            return redirect('/usuarios');
        } 
        
        else
        {
            return redirect('/doacoes');
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
