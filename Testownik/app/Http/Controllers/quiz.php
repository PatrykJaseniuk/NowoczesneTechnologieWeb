<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Middleware\CzyToUczen;

class quiz extends Controller
{
    public function __construct()
    {
        $this->middle = CzyToUczen::class;
        $this->arg1 = 'quizId';
    }
    public function dzialaj($quizId)
    {
        $czyUczenMaDostepDoQuizu = $this->sprawdzanieCzyUczenMaDostepDoQuizu($quizId);
        if ($czyUczenMaDostepDoQuizu) {
            $pytania = $this->getPytaniaQuizu($quizId);
            return view('quiz',
                ['callBackSprawdzQuiz' => (new sprawdzquiz())->routeGet($quizId), 'pytania' => $pytania]
            );
        } else {
            return redirect((new uczen())->routeGet());
        }
    }

    private function sprawdzanieCzyUczenMaDostepDoQuizu($quizId)
    {
        $test = ('App\Models\test')::find($quizId);

        $czyMaDostep = false;
        $teraz = date('Y-m-d');
        $odKiedy = $test->data_rozpoczecia;
        $doKiedy = $test->data_zakonczenia;


        if ($teraz > $odKiedy && $teraz < $doKiedy) {
            $czyMaDostep = true;
        } else {
            $czyMaDostep = false;
        }

        // $wiadomosc = 'teraz: '.$teraz.' do kiedy: '. $doKiedy. ' od kiedy: '.$odKiedy. ' teraz>dokiedy '. ($teraz>$odKiedy).' czymaDostep: '.$czyMaDostep ;
        //          print($wiadomosc);
        return $czyMaDostep;
    }

    private function getPytaniaQuizu($quizId)
    {
        $test = ('App\Models\test')::find($quizId);
        $pytania = $test->pytanie->toArray();
        // //to do
        // $pytanie1 = ['idPytania'=>1 ,'trescPytania'=>'Ile kosztuje tona eko groszku. quiz: '.$quizId, 'wariantyOdpowiedzi'=>['1000', '1500', '3000', '5000']];
        // $pytanie2 = ['idPytania'=>2 ,'trescPytania'=>'Ile wazy ziemia', 'wariantyOdpowiedzi'=>['malo', 'duzo', 'bazdzo Duzo', '5,9722⋅E24']];
        // return [$pytanie1,$pytanie2];
        return $pytania;
    }
}
