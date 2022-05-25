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
        $uzytkownik = session()->get('uzytkownik',null);
        $daneUcznia = $this->getDaneUcznia($uzytkownik);
        $dostepneQuizyZCallbackami = $this->getDostepneQuizyZCallbackami($uzytkownik);
        $rozwiazaneQuizyZCallbackami = $this->getRozwiazaneQuizyZCallbackami($request);
        return view('uczen', ['dostepneQuizyZCallbackami'=>$dostepneQuizyZCallbackami,
        'rozwiazaneQuizyZCallbackami'=>$rozwiazaneQuizyZCallbackami,
        'daneUcznia'=>$daneUcznia]);
    }

    private function getDaneUcznia($uzytkownik)
    {
        $daneUcznia = ['imie'=>$uzytkownik->imie, 'nazwisko'=>$uzytkownik->nazwisko];
        return $daneUcznia;
    }

    private function getDostepneQuizyZCallbackami($uzytkownik)
    {
        // $testy = test::whereHas('comments', function($q)
        // {
        //     $q->where('content', 'like', 'foo%');

        // })->get();
        $quiz = new quiz();
        $wszystkieTesty= $uzytkownik->test->toArray();
            $testy=[];
        foreach ($wszystkieTesty as $key => $value) {
            $testy[$key] =['dane'=>$value, 'callbackRozpocznijQuiz'=>$quiz->routeGet($value['id'])];
        }
        // $testyBezodpowiedzi = $wszystkieTesty->


        $quiz1 = ['dane'=>['nazwa'=>'Bardzo trudny quiz',
        'czas'=>'10',
        'dataRozpoczecia'=>'dzisiaj',
        'dataZakonczenia'=>'jutro'],
        'callbackRozpocznijQuiz'=>$quiz->routeGet(1)];

        $quiz2 = ['dane'=>['nazwa'=>'Bardzo latwy quiz',
        'czas'=>'30',
        'dataRozpoczecia'=>'jutor',
        'dataZakonczenia'=>'pojutrze'],
        'callbackRozpocznijQuiz'=>$quiz->routeGet(2)];

        return $testy;
    }

    private function getRozwiazaneQuizyZCallbackami($request)
    {
        //to do
        $quizWyniki = new quizwyniki();
        $quiz1 = ['dane'=>['nazwa'=> 'test na pilota bombowca',
        'wynik'=>'90%'],
        'callBackQuizWyniki'=>$quizWyniki->routeGet(1)];

        $quiz2 = ['dane'=>['nazwa'=> 'test na pilota mysliwca',
        'wynik'=>'80%'],
        'callBackQuizWyniki'=>$quizWyniki->routeGet(2)];

        return [$quiz1, $quiz2];
    }
}
