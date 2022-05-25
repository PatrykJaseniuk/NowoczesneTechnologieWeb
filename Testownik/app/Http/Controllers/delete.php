<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CzyToNauczyciel;

class delete extends Controller
{
    public function __construct()
    {
        $this->arg1='tabela';
        $this->arg2='id';
        $this->middle = CzyToNauczyciel::class;
    }

    public function dzialaj($tabela,$id)
    {
        ('App\Models\\'.$tabela)::destroy($id);
        return redirect((new read())->routeGet($tabela));
    }
}
