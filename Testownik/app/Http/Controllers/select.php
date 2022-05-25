<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CzyToNauczyciel;

class select extends Controller
{
    public function __construct()
    {
        $this->arg1='tabela';
        $this->arg2 = 'tabelarelacji';
        $this->arg3='id';
        $this->middle = CzyToNauczyciel::class;
    }


    public function dzialaj($nazwaTabela1, $nazwaTabela2, $id1)
    {

        $rekordyPowiazaneZTabela1Id1ZTabeli2=('App\Models\\'.$nazwaTabela1)::where('id',$id1)->first()->$nazwaTabela2;
        $idsTabela2PowiazaneZRekordemId1ZTabeli1= $this->f($rekordyPowiazaneZTabela1Id1ZTabeli2);
        $rekordy = ('App\Models\\'.$nazwaTabela2)::whereNotIn('id',$idsTabela2PowiazaneZRekordemId1ZTabeli1 )->get()->toArray();
        return view
        (
            'select',
            [
                'callBackSelectAction'=>(new selectaction())->routeGet($nazwaTabela1,$nazwaTabela2, $id1),
                'nazwaTabeli1'=>$nazwaTabela1,
                'nazwaTabeli2'=>$nazwaTabela2,
                'id1'=>$id1,
                'rekordy'=>$rekordy,
                'test'=>$idsTabela2PowiazaneZRekordemId1ZTabeli1
            ]
        );
    }

    private function f($rekordy)
    {
        $ids=[];
        if($rekordy!=null)
        {
           foreach ($rekordy as $rekord) {
            array_push($ids, $rekord->id);
        }
        }

        return $ids;
    }
}
