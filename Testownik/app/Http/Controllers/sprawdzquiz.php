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
    public function dzialaj($idTest ,Request $request)
    {
        $uzytkownik= session()->get('uzytkownik',null);
        $idUzytkownik = $uzytkownik->id;
        $this->sprawdz($idTest, $idUzytkownik);
        return redirect((new quizwyniki())->routeGet($idTest,$idUzytkownik ));
        //  view('quizwyniki', ['callBackSzczegolyUcznia'=>(new szczegolyUcznia)->routeGet()]);
    }

    private function sprawdz($idTest, $idUzytkownik)
    {
        
        $wynikRekord = ('App\Models\wynik')::where('id_test', $idTest)->where('id_uzytkownik',$idUzytkownik)->first();
        if($wynikRekord=null)
        {           
            $pytania =  ('App\Models\test')::find( $idTest)->pytanie->toArry();
            $odpowiedzi = ('App\Models\odpowiedz')::where('id_test', $idTest)->where('id_uzytkownik', $idUzytkownik);

            $uzyskanePunkty=0;
            $iloscPytan=0;
            foreach ($pytania as $key => $pytanie) {
                $idPytania = $pytanie['id'];
                $odpowiedz = $odpowiedzi->where('id_pytania', $idPytania)->firs();
                if($odpowiedz!=null)
                {
                    if($pytanie['prawidlowa_odpowiedz']==$odpowiedz->odpowiedz)
                    {
                        $uzyskanePunkty++;
                    }
                }
                $iloscPytan++;
            }

            $wynik = celi($uzyskanePunkty/ $iloscPytan);
            $wynikRekord = new ('App\Models\wynik') ();
            $wynikRekord->wynik=$wynik;
            $wynikRekord->id_test=$idTest;
            $wynikRekord->id_uzytkownik=$idUzytkownik;

            $wynikRekord->seve();
        }
    }
}
