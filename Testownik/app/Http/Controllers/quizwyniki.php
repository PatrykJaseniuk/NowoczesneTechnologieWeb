<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Middleware\CzyToZalogowanyUzytkownik;

class quizwyniki extends Controller
{

    public function __construct()
    {
        $this->arg1 = 'quizId';
        $this->arg1 = 'uzytkownikId';
        $this->middle = CzyToZalogowanyUzytkownik::class;
    }
    public function dzialaj($quizId, $uzytkownikId)
    {
        $czyUczenMaDostepDoQuizu = $this->sprawdzanieCzyUczenMaDostepDoQuizu($quizId);
        if($czyUczenMaDostepDoQuizu)
        {
            $pytania = $this->getPytaniaQuizu($quizId);
            return view('quizwyniki', ['pytania'=>$pytania]);
        }
        else
        {
            return redirect((new uczen())->routeGet());
        }

    }

    private function sprawdzanieCzyUczenMaDostepDoQuizu($quizId)
    {
        // to do
        return true;
    }

    private function getPytaniaQuizu($quizId)
    {
        //to do
        $pytanie1 = ['trescPytania'=>'Ile kosztuje tona eko groszku',
         'wariantyOdpowiedzi'=>[
             ['czyZaznaczono'=>'true','czyPrawidlowa'=>'false', 'odpowiedz'=>'1000'],
             ['czyZaznaczono'=>'false','czyPrawidlowa'=>'false', 'odpowiedz'=>'2000'],
             ['czyZaznaczono'=>'false','czyPrawidlowa'=>'false', 'odpowiedz'=>'3000'],
             ['czyZaznaczono'=>'false','czyPrawidlowa'=>'true', 'odpowiedz'=>'6000']
             ]];

             $pytanie2 = ['trescPytania'=>'Ile wazy ziemia',
         'wariantyOdpowiedzi'=>[
             ['czyZaznaczono'=>'true','czyPrawidlowa'=>'false', 'odpowiedz'=>'malo'],
             ['czyZaznaczono'=>'false','czyPrawidlowa'=>'false', 'odpowiedz'=>'duzo'],
             ['czyZaznaczono'=>'false','czyPrawidlowa'=>'false', 'odpowiedz'=>'bardzo duzo'],
             ['czyZaznaczono'=>'false','czyPrawidlowa'=>'true', 'odpowiedz'=>'5,9722⋅E24']
             ]];


        return [$pytanie1,$pytanie2];
    }
}
