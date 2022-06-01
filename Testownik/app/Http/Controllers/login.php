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
        // $date1 = date_create('2000-10-10');
        // $date2 = date_create('2001-10-10');
        // $delta = date_sub($date2,$date1);
        // $wiadomosc = 'data1 '.$date1.' data2 '.$data2. ' roznica '. $delta;
        // print($wiadomosc);
        return view('login', ['callBackLoginAction'=>$loginAction->routeGet(), 'arguments'=> $loginAction->argumenty]);
    }
}
