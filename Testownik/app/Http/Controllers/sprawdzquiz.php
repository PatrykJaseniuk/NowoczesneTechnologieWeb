<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Middleware\CzyToUczen;

class sprawdzquiz extends Controller
{
    public function __construct()
    {
        $this->middle = CzyToUczen::class;
        $this->method = 'post';
        $this->arg1 = 'idTest';
    }
    public function dzialaj($idTest, Request $request)
    {
        $uzytkownik = session()->get('uzytkownik', null);
        $idUzytkownik = $uzytkownik->id;
        $this->sprawdz($idTest, $idUzytkownik, $request);
        return redirect((new quizwyniki())->routeGet($idTest,$idUzytkownik ));
        //view('quizwyniki', ['callBackSzczegolyUcznia' => (new szczegolyUcznia)->routeGet()]);
    }

    private function sprawdz($idTest, $idUzytkownik, $request)
    {
    
        $wynikRekord = ('App\Models\wynik')::where('id_test', $idTest)->where('id_uzytkownik', $idUzytkownik)->first();
        if ($wynikRekord == null) {
            $this->zapiszOdpowiedzi($idTest, $idUzytkownik, $request);

            $pytania =  ('App\Models\test')::find($idTest)->pytanie->toArray();
            $odpowiedzi = ('App\Models\odpowiedz')::where('id_test', $idTest)->where('id_uzytkownik', $idUzytkownik)->get();
            // $odpowiedzi = ('App\Models\odpowiedz')::all()->toArray();

            $uzyskanePunkty = 0;
            $iloscPytan = 0;
            print('idTest: ' . $idTest . ' idUzytkownik: ' . $idUzytkownik);
            // print('odpowiedzi :'.http_build_query($odpowiedzi->toArray(),'',', '));
            foreach ($pytania as $pytanie) {
                $idPytania = $pytanie['id'];
                $odpowiedz = $odpowiedzi->where('id_pytanie', $idPytania)->first();
                print('idPytania: ' . $idPytania);
                print(($odpowiedz));

                if ($odpowiedz != null) {
                    if ($pytanie['prawidlowa_odpowiedz'] == $odpowiedz->odpowiedz) {
                        $uzyskanePunkty++;
                    }
                }
                $iloscPytan++;
            }

            $wynik = ceil($uzyskanePunkty / $iloscPytan * 100);
            $wynikRekord = new ('App\Models\wynik')();
            $wynikRekord->wynik = $wynik;
            $wynikRekord->id_test = $idTest;
            $wynikRekord->id_uzytkownik = $idUzytkownik;

            print($wynik);
            print($iloscPytan);
            $wynikRekord->save();
        }
    }

    private function zapiszOdpowiedzi($idTest, $idUzytkownik, $request)
    {
        $odpowiedzi = $request->all();
        unset($odpowiedzi['_token']);

        foreach ($odpowiedzi as $idPytanie => $odpowiedz) {
            $odpowiedzRekord = new ('App\Models\odpowiedz')();
            $odpowiedzRekord->id_pytanie = $idPytanie;
            $odpowiedzRekord->id_test = $idTest;
            $odpowiedzRekord->id_uzytkownik = $idUzytkownik;
            $odpowiedzRekord->odpowiedz = $odpowiedz;
            $odpowiedzRekord->save();
        }
    }
}
