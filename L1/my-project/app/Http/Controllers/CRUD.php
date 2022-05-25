<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CRUD extends Controller
{
    private $tabele;
    private $zainicjalizowano = false;

    public function crud($tabela, $funkcja)
    {
        print('witam');
        print($tabela);
        print($funkcja);
        // if($this->zainicjalizowano!=true)
        // {
        //     $this->tabele = ['uczen' => new Tabela()];

        //     $this->zainicjalizowano = true;
        //     print('inicjalizacja');
        // }
        // $wynikFunkcji =  $tabele['uczen']->read();
        $kontrolerTabeli= new KontrolerTabeli($tabela);

        $wynikFunkcji = call_user_func($kontrolerTabeli, $funkcja); //wywolanie metody o nazwie zawartej w zmiennej '$funkcja' z obiektu '$tabela'
        return $wynikFunkcji;
    }
}
