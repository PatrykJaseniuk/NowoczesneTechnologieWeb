<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CzyToNauczyciel;

class updateaction extends Controller
{
    public function __construct()
    {
        $this->arg1='tabela';
        $this->arg2='id';
        $this->method='post';
        $this->middle = CzyToNauczyciel::class;
    }

    public function dzialaj($tabela, $id, Request $request)
    {
        $rekord = ('App\Models\\'.$tabela)::where('id', $id)->first();
        $this->wpiszDaneZRzadananiaDoRekordu($rekord, $request);
        $rekord->save();

        return redirect((new details())->routeGet($tabela, $id));
    }

    public function wpiszDaneZRzadananiaDoRekordu($rekord, $request)
    {
        $nazwyPol = $rekord->fillable;
        foreach ($nazwyPol as $nazwaPola) {
            $rekord->$nazwaPola = $request->input($nazwaPola);
        }
    }
}
