<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CzyToNauczyciel;

class details extends Controller
{
    public function __construct()
    {
        $this->middle = CzyToNauczyciel::class;
        $this->arg1 = 'tabela';
        $this->arg2 = 'id';
    }

    public function dzialaj($tabela, $id)
    {
        $rekord = ('App\Models\\'.$tabela)::where('id', $id)->first();

        $tabeleZwiazane = $this->getTabeleZwiazane($rekord);
        $rekordDane = $rekord->toArray();
        $callBackUpdate = (new update())->routeGet($tabela, $id);
        $callBackDelete = (new delete())->routeGet($tabela, $id);

        return view('details', [
        'callBackUpdate'=>$callBackUpdate,
        'callBackDelete'=>$callBackDelete,
        'nazwaTabeli'=>$tabela,
        'rekord'=>$rekordDane,
        'tabeleZwiazaneZCallBackami'=>$tabeleZwiazane]);
    }

    private function getTabeleZwiazane($rekord)
    {
        $tabele= $rekord->getTabeleZwiazane();

        $tabeleZCallBackami=[];

        foreach ($tabele as $nazwaTabeli2 => $tabela) {
            $tabelaZCallbackami=[];
            $tabela = $tabela->toArray();
            foreach ($tabela as $key => $rekord2) {
                $tabela1 = $rekord->table;
                $id1 = $rekord->id;
                $tabela2 = $nazwaTabeli2;
                $id2 = $rekord2['id'];
                $tabelaZCallbackami[$key] = ['rekord'=>$rekord2, 'callBack'=>(new unselect())->routeGet($tabela1, $id1, $tabela2, $id2)];
                }
            $tabeleZCallBackami[$nazwaTabeli2] = ['tabelaZCallBackami'=>$tabelaZCallbackami, 'callBack'=>(new select())->routeGet($rekord->table, $nazwaTabeli2,$rekord->id)];

        }
        return $tabeleZCallBackami;
    }
}
