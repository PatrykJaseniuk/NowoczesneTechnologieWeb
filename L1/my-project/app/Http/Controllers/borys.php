<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class borys extends Controller
{
    //zmienne do przeslania

    public function funkcja()
    {
$przywitanie = 'Witam Panstwa bardzo serdecznie';
            $podpis = 'Borys Borysinski';

//compact to funkcja ktora przesyla zmienne do widoku, dziwaczen
        return view('borys', compact('przywitanie', 'podpis'));
    }

    public function prostePrzywitanie()
    {
        $przywitanie = 'Witam Panstwa bardzo serdecznie';
        //inny sposob na przeslanie zmiennej do widoku. W taki sposob mozna przeslac tylko jedna zmienna.
        return view('borys')->with('przywitanie', $przywitanie);
        return 'Po prostu witam!';
    }

    public function przeslanieObiektu()
    {
        $dane = [
            'samolot1'=>'f16',
            'samolot2'=>'f22'
        ];
        return view('andrzej')->with('dane', $dane);
    }
}
