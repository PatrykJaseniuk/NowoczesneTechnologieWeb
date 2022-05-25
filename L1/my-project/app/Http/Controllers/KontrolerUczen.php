<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontrolerUczen extends Controller
{

    private $scierzka = 'uczen';
    public function read()
    {

        $uczniowie = [['imie'=> 'Marian', 'nazwisko'=>'Borysinski', 'id'=>1], ['id'=>2, 'imie'=>'Zbigniew', 'nazwisko'=> 'Duda']];
        return view('CRUD.read',['nazwaTabeli'=> 'Pytania', 'tabela'=> $uczniowie, 'scierzka'=>$this->scierzka]);
    }

    public function create()
    {
        $encja = ['imie', 'nazwisko'];
        return view('CRUD.create', ['encja' => $encja, 'nazwaEncji'=>'uczen']);
    }

    public function edit($id)
    {
        $encja = ['imie'=> 'Marian', 'nazwisko'=>'Borysinski', 'id'=>$id];
        return view('CRUD.edit', ['encja'=>$encja, 'nazwaEncji'=>'uczen']);
    }
}
