<?php

namespace App\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Http\Controllers\read;
use App\Http\Controllers\uczen;
use App\Http\Controllers\logout;

class Comp
{
       /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {


        $uzytkownik = session('uzytkownik',['typ'=>'niezalogowany', 'nazwa'=>'']);
        $linki =[];
        $callBackLogout = null;

            if($uzytkownik['typ'] == 'nauczyciel')
        {
            $linki =
                   [
                       'uzytkownik'=>(new read())->routeGet('uzytkownik'),
                       'klasa'=>(new read())->routeGet('klasa'),
                       'test'=>(new read())->routeGet('test'),
                       'pytanie'=>(new read())->routeGet('pytanie')
                   ];
                   $callBackLogout =(new logout())->routeGet();
        }
        else if($uzytkownik['typ'] == 'uczen')
        {
            $linki = ['uczen'=> (new uczen())->routeGet()];
            $callBackLogout =(new logout())->routeGet();
        }
            $view->with('linki', $linki)
            ->with('uzytkownik',$uzytkownik)
            ->with('callBackLogout',$callBackLogout);
        }

}
