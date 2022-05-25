<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class logout extends Controller
{

    public function dzialaj()
    {
        $this->wyloguj();
        return redirect((new login())->routeGet());
    }

    public function wyloguj()
    {
        session()->flush();
    }

}
