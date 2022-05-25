<?php
namespace App\Http\Controllers;

class Tabela
{
    private $nazwaTabeli;

    public function __construct($nazwaTabeli)
    {
        $this->nazwaTabeli = $nazwaTabeli;
    }

    public static function read()
    {
        $uczniowie = [['imie'=> 'Marian', 'nazwisko'=>'Borysinski', 'id'=>1], ['id'=>2, 'imie'=>'Zbigniew', 'nazwisko'=> 'Duda']];
        return view('CRUD.read',['nazwaTabeli'=> 'Pytania', 'tabela'=> $uczniowie, 'scierzka'=>'scierzka']);
    }

    public function create($id)
    {
        $encja = ['id'=> $id, 'imie', 'nazwisko'];
        return view('CRUD.create', ['encja' => $encja]);
    }

    public function update($id)
    {
        $encja = ['imie'=> 'Marian', 'nazwisko'=>'Borysinski', 'id'=>$id];
        return view('CRUD.update', ['encja'=>$encja, 'nazwaEncji'=>'uczen']);
    }
}

