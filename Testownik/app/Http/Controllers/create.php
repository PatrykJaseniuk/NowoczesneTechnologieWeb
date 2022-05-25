<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\CzyToNauczyciel;
use Illuminate\Support\Facades\Schema;

use App\Models\odpowiedz;
use App\Models\pytanie;
use App\Models\test;
use App\Models\uzytkownik;
use App\Models\klasa;

class create extends Controller
{
    public function __construct()
    {
        $this->middle = CzyToNauczyciel::class;
        $this->arg1='tabela';
    }

    public function dzialaj($tabelaNazwa)
    {
        $kolumny = (new ('App\Models\\'.$tabelaNazwa)())->fillable;
        // $kolumny = Schema::getColumnListing($tabelaNazwa);
        return view('create', ['callBackCreateAction'=>(new createaction())->routeGet($tabelaNazwa), 'kolumny'=>$kolumny, 'nazwaTabeli'=>$tabelaNazwa]);
    }
}
