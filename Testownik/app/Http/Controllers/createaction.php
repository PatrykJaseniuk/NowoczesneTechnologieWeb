<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CzyToNauczyciel;

class createaction extends Controller
{
    public function __construct()
    {
        $this->middle = CzyToNauczyciel::class;
        $this->arg1='tabela';
        $this->method='post';
    }

    public function dzialaj($tabela, Request $request)
    {
        $pelnyAdresModelu = 'App\Models\\'.$tabela;
        $nowyRekord = new $pelnyAdresModelu(); // czy to bedzei dzialac?
        $nazwyPola = $nowyRekord->fillable;

        foreach ($nazwyPola as $nazwaPola) {
            $nowyRekord->$nazwaPola = $request->input($nazwaPola);
        }
        $nowyRekord->save();

        return redirect((new read())->routeGet($tabela));
    }
}
