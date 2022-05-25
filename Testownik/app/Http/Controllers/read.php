<?php

namespace App\Http\Controllers;
use App\Models\odpowiedz;
use App\Models\pytanie;
use App\Models\test;
use App\Models\uzytkownik;
use App\Models\klasa;
use App\Http\Controllers\details;
use Illuminate\Support\Facades\Schema;


use Illuminate\Http\Request;
use App\Http\Middleware\CzyToNauczyciel;

class read extends Controller
{
    public function __construct()
    {
        $this->middle = CzyToNauczyciel::class;
        $this->arg1='tabelaNazwa';
    }


    public function dzialaj($tabelaNazwa)
    {
        $rekordy = ('App\Models\\'.$tabelaNazwa)::all()->toArray();
        $rekordyZCallBackami = $this->dodajCallbacki($tabelaNazwa, $rekordy);
        $kolumny = Schema::getColumnListing($tabelaNazwa);

        return view('read', ['callBackCreate'=>(new create())->routeGet($tabelaNazwa),
         'rekordyZCallbackami'=>$rekordyZCallBackami,
         'kolumny'=> $kolumny,
         'nazwaTabeli'=>$tabelaNazwa]);
    }

    private function dodajCallbacki($tabelaNazwa, $rekordy)
    {
        $rekordyZCallbackami= [];
        foreach ($rekordy as $key => $value)
        {
            $rekordyZCallbackami[$key]=['rekord'=>$value,'callBack'=> (new details())->routeGet($tabelaNazwa,$value['id'] ) ];
        }
        return $rekordyZCallbackami;
    }
}
