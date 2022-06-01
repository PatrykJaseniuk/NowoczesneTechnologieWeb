<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Middleware\CzyToUczen;

class uczen extends Controller
{
    public function __construct()
    {
        $this->middle = CzyToUczen::class;
    }

    public function dzialaj(Request $request)
    {
        $uzytkownik = session()->get('uzytkownik', null)->refresh();
        $daneUcznia = $this->getDaneUcznia($uzytkownik);
        $dostepneQuizyZCallbackami = $this->getDostepneQuizyZCallbackami($uzytkownik);
        $rozwiazaneQuizyZCallbackami = $this->getRozwiazaneQuizyZCallbackami($uzytkownik);
        return view('uczen',
            [
                'dostepneQuizyZCallbackami' => $dostepneQuizyZCallbackami,
                'rozwiazaneQuizyZCallbackami' => $rozwiazaneQuizyZCallbackami,
                'daneUcznia' => $daneUcznia
            ]
        );
    }

    private function getDaneUcznia($uzytkownik)
    {
        $daneUcznia = ['imie' => $uzytkownik->imie, 'nazwisko' => $uzytkownik->nazwisko];
        return $daneUcznia;
    }

    private function getDostepneQuizyZCallbackami($uzytkownik)
    {
        $wszystkieTesty = $uzytkownik->test->toArray();

        $testyDostepne = [];
        foreach ($wszystkieTesty as $key => $test) {
            $wynikTestu = ('App\Models\wynik')::where('id_test', $test['id'])->where('id_uzytkownik', $uzytkownik->id)->first();
            $czyTerminWlasciwy = $this->czyDataPasuje($test['id']);

            if ($wynikTestu == null && $czyTerminWlasciwy == true) {
                $testyDostepne[$key] = $test;
            }
        }

        $testyZClabackami = [];
        foreach ($testyDostepne as $key => $value) {
            $testyZClabackami[$key] = [
                'dane' => $value,
                'callbackRozpocznijQuiz' => (new quiz())->routeGet($value['id'])
            ];
        }
        return $testyZClabackami;
    }

    private function getRozwiazaneQuizyZCallbackami($uzytkownik)
    {
        $wszystkieTesty = $uzytkownik->test->toArray();
        $testyZWynikami = [];

        foreach ($wszystkieTesty as $key => $test) {
            $wynik = ('App\Models\wynik')::where('id_test', $test['id'])->where('id_uzytkownik', $uzytkownik->id)->first();
            if ($wynik != null) {
                $testyZWynikami[$key] = [
                    'dane' => $test,
                    'wynik' => $wynik->wynik,
                    'callBackQuizWynik' => (new quizwyniki())->routeGet($test['id'], $uzytkownik->id)
                ];
            }
        }
        return $testyZWynikami;
    }

    private function czyDataPasuje($quizId)
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
        return $czyMaDostep;
    }
}
