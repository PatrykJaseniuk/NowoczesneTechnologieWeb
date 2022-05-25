<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontrolerPytanie extends Controller
{
    public function read()
    {
        $uczniowie = [['imie'=> 'Marian', 'nazwisko'=>'Borysinski'], ['imie'=>'Zbigniew', 'nazwisko'=> 'Duda']];
        return view('CRUD.read',['nazwaTabeli'=> 'Pytania', 'tabela'=> $uczniowie]);
    }

    public function create($id)
    {
        $encja = ['id'=> $id, 'imie', 'nazwisko'];
        return view('CRUD.create', ['encja' => $encja]);
    }

    public function edit($id)
    {
        $encja = ['id'=>$id, 'imie'=> 'Marian', 'nazwisko'=>'Borysinski'];
        return view('CRUD.edit', ['nazwaEncji'=>$encja]);
    }
}
