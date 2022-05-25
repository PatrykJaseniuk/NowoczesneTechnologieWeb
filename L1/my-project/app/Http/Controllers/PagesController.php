<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
 public function index()
 {
     return view('index');
 }

 public function about()
 {
     return view('about');
 }

 public function dodajPytanie()
 {
     return view('dodajPytanie');
 }

 public function edytujPytanie()
 {
     
 }

 public function uczniowie()
 {
    $uczniowie = ['imie'=>'Marian', 'nazwisko'=> 'Kowalski'];

    return view ('uczniowie');
 }

}
