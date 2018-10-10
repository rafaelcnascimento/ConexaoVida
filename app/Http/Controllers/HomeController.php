<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
            return view('home');
        }
    }

    public function comoFunciona()
    {    
        return view('home'); 
    }
}
