<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\uzytkownik;

class loginaction extends Controller
{
    public $argumenty;


    public function __construct()
    {
        $this->method='post';
        $this->argumenty=['login'=>'text', 'password'=>'password'];
    }

    public function dzialaj(Request $request)
    {
        $uzytkownik=null;
        $daneLogowania = $this->odczytajDaneLogowania($request);
        if($daneLogowania!=null)
        {
            $uzytkownik = $this->odszukajUzytkownika($daneLogowania);
        }

        if($uzytkownik!=null)
        {
            $request->session()->put('uzytkownik', $uzytkownik);
            if($uzytkownik->typ=='nauczyciel')
            {
                return redirect((new read())->routeGet('uzytkownik'));
            }
            else if($uzytkownik->typ== 'uczen')
            {
                return redirect((new uczen())->routeGet());
            }
        }
        else
        {
            return redirect((new login())->routeGet());
        }
    }

    private function odczytajDaneLogowania(Request $request)
    {
        $login = $request->input('login',null);
        $password = $request->input('password',null);
        if($login !=null && $password != null)
        {
            return ['login' =>$login, 'password' => $password];
        }
        else
        {
            return null;
        }
    }

    private function odszukajUzytkownika($daneLogowania)
    {
        //to do: polaczenie z modelem
        $uzytkownik= uzytkownik::where('login', $daneLogowania['login'])->first();

        if($uzytkownik!=null)
        {
            if($uzytkownik->password == $daneLogowania['password'])
            return $uzytkownik;
        }
        else
        {
            return null;
        }
    }
}
