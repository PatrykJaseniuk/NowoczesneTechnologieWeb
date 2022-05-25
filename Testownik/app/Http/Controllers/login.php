<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class login extends Controller
{
    public function __construct()
    {
        
        // $this->arg1 = 'rezultat';
    }
    public function dzialaj()
    {
        $loginAction = new loginaction();
        return view('login', ['callBackLoginAction'=>$loginAction->routeGet(), 'arguments'=> $loginAction->argumenty]);
    }
}
