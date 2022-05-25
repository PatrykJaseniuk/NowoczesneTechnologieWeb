<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CzyToNauczyciel;

class update extends Controller
{
    public function __construct()
    {
        $this->arg1 = 'tabela';
        $this->arg2 = 'id';
        $this->middle = CzyToNauczyciel::class;
    }

    public function dzialaj($tabela, $id)
    {
        $rekord = ('App\Models\\'.$tabela)::where('id', $id)->first()->toArray();
        $callBackUpdateAction = (new updateAction())->routeGet($tabela, $id);



        return view('update',
            [
                'callBackUpdateAction'=>$callBackUpdateAction,
                'nazwaTabeli'=>$tabela,
                'rekord'=>$rekord
            ]
        );
    }
}
