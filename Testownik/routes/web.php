<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\funkcja;
use  App\Http\Controllers\quiz;
use  App\Http\Controllers\sprawdzquiz;
use  App\Http\Controllers\szczegolyucznia;
use  App\Http\Controllers\read;
use  App\Http\Controllers\create;
use  App\Http\Controllers\createaction;
use  App\Http\Controllers\update;
use  App\Http\Controllers\updateaction;
use  App\Http\Controllers\details;
use  App\Http\Controllers\select;
use  App\Http\Controllers\selectaction;
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

Route::get('/', function () {
    return view('welcome');
});

(new quiz())->routeSet();
(new sprawdzquiz())->routeSet();
(new read())->routeSet();
(new create())->routeSet();
(new createaction())->routeSet();
(new update())->routeSet();
(new updateaction())->routeSet();
(new details())->routeSet();
(new select())->routeSet();
(new selectaction())->routeSet();
(new App\Http\Controllers\login())->routeSet();
(new App\Http\Controllers\loginaction())->routeSet();
(new App\Http\Controllers\uczen())->routeSet();
(new App\Http\Controllers\quizwyniki())->routeSet();
(new App\Http\Controllers\logout())->routeSet();
(new App\Http\Controllers\delete())->routeSet();
(new App\Http\Controllers\unselect())->routeSet();

