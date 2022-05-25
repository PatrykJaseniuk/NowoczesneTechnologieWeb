<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SamolotyControler extends Controller
{
    public function pokarz($nazwa)
    {
        $bazaDanych = [ 'f22'=>'F-22 Raptor',
        'f16' => 'F-16 Viper'];

        return view('samoloty',
        //jezeli przed ?? jest null opreator zwraca to co po prawej
        ['samolot' => $bazaDanych[$nazwa] ?? "samolotu o nazwaie:  '". $nazwa. "'  nie mam w bazie danych"]
        );
    }
}
