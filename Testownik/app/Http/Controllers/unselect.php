<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CzyToNauczyciel;

class unselect extends Controller
{
    public function __construct()
    {
        $this->arg1='tabela1';
        $this->arg2='id1';
        $this->arg3='tabela2';
        $this->arg4='id2';
        $this->middle = CzyToNauczyciel::class;
    }

    public function dzialaj($tabela1,$id1,$tabela2,$id2)
    {
        ('App\Models\\'.$tabela1)::find($id1)->$tabela2()->detach($id2);
        $wiadomosc = 'tabela1 = '.$tabela1. ' tabela2 = '. $tabela2. ' id1 = '. $id1. ' id2 = '.$id2;
        print($wiadomosc);
        return redirect((new details())->routeGet($tabela1, $id1));
    }
}
