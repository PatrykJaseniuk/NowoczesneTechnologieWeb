<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Middleware\CzyToZalogowanyUzytkownik;

class quizwyniki extends Controller
{

    public function __construct()
    {
        $this->arg1 = 'idTest';
        $this->arg2 = 'idUzytkownik';
        $this->middle = CzyToZalogowanyUzytkownik::class;
    }
    public function dzialaj($idTest, $idUzytkownik)
    {
        $czyUczenMaDostepDoQuizu = $this->sprawdzanieCzyUczenMaDostepDoQuizu($idTest);
        if ($czyUczenMaDostepDoQuizu) {
            $pytaniaIOdpowiedzi = $this->getPytaniaIOdpowiedziQuizu($idTest, $idUzytkownik);
            $wynik = $this->getWynik($idTest, $idUzytkownik);
            return view('quizwyniki',
                [
                    'pytaniaIOdpowiedzi' => $pytaniaIOdpowiedzi,
                    'wynik'=>$wynik
                ]
            );
        } else {
            return redirect((new uczen())->routeGet());
        }
    }

    private function sprawdzanieCzyUczenMaDostepDoQuizu($idTest)
    {
        // to do
        return true;
    }

    private function getPytaniaIOdpowiedziQuizu($idTest, $idUzytkownik)
    {
        $pytania = ('App\Models\test')::find($idTest)->pytanie;
        $odpowiedzi = ('App\Models\odpowiedz')::where('id_test', $idTest)->where('id_uzytkownik', $idUzytkownik);


        $pytaniaIOdpowiedzi = [];
        foreach ($pytania as $key => $pytanie) {
            $odpowiedzRekord = ('App\Models\odpowiedz')::where('id_test', $idTest)->where('id_uzytkownik', $idUzytkownik)->where('id_pytanie', $pytanie->id)->first();
            $udzielonaOdpowiedz = '';
            if ($odpowiedzRekord != null) {
                $udzielonaOdpowiedz = $odpowiedzRekord->odpowiedz;
            }
            $pytaniaIOdpowiedzi[$key] = [
                'pytanie' => $pytanie->tresc,
                'prawidlowaOdpowiedz' => $pytanie->prawidlowa_odpowiedz,
                'udzielonaOdpowiedz' => $udzielonaOdpowiedz
            ];
        }
        return $pytaniaIOdpowiedzi;
    }

    private function getWynik($idTest, $idUzytkownik)
    {
        return ('App\Models\wynik')::where('id_test', $idTest)->where('id_uzytkownik', $idUzytkownik)->first()->wynik;
    }
}
