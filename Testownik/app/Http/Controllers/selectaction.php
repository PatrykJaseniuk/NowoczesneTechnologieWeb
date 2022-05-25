<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CzyToNauczyciel;

class selectaction extends Controller
{
    public function __construct()
    {
        $this->arg1='tabelaBazowa';
        $this->arg2='tabelaDoDowiazania';
        $this->arg3='idTabelaBazowa';
        $this->method='post';
        $this->middle = CzyToNauczyciel::class;
    }

    public function dzialaj($tabela1,$tabela2, $id1, Request $request)
    {
        $ids = $this->getIds($request);
        $rekord = $rekordyPowiazaneZTabela1Id1ZTabeli2=('App\Models\\'.$tabela1)::where('id',$id1)->first();
        $rekord->$tabela2()->syncWithoutDetaching($ids);

        // print(http_build_query($ids, '', ', '));
        return redirect((new details())->routeGet($tabela1, $id1));
    }

    private function getIds($request)
    {
        $wejscie = $request->all();
        unset($wejscie['_token']);
        $ids = array_keys($wejscie);
        return $ids;
    }
}
