<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\borys;
use App\Http\Controllers\SamolotyControler;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\KontrolerUczen;
use App\Http\Controllers\KontrolerPytanie;
use App\Http\Controllers\CRUD;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return env('DB_DATABASE');
// });

// sciezka :'/borys' wywoluje metode klasy 'borys' 'funkcja'
Route::get('/borys', [borys::class, 'funkcja']);

Route::get('/borys/prosty', [borys::class, 'prostePrzywitanie']);

Route::get('/borys/andrzej',[borys::class, 'przeslanieObiektu']);

Route::get('samoloty/{id}', [SamolotyControler::class, 'pokarz']);

Route::get('/', [PagesController::class, 'index']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/dodajPytanie', [PagesController::class, 'dodajPytanie']);
Route::get('/controleStructures/{parametr}', function ($parametr) {

    $samoloty = ['f16', 'f22', 'f35'];
    return view('controleStructures',['parametr'=>$parametr, 'samoloty'=>$samoloty]);
});


Route::get('/uczen', [KontrolerUczen::class, 'read']);
Route::get('/uczen/edytuj/{id}', [KontrolerUczen::class, 'edit']);
Route::get('/uczen/dodaj', [KontrolerUczen::class, 'create']);

Route::get('/pytanie', [KontrolerPytanie::class, 'read']);
Route::get('/pytanie/edytuj', [KontrolerPytanie::class, 'edit']);
Route::get('/crud/{tabela}/{funkcja}', [CRUD::class, 'crud']);
