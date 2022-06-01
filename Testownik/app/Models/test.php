<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class test extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'test';
    public $fillable = [
        'nazwa',
        'data_rozpoczecia',
        'data_zakonczenia',
        'czas_trwania'
    ];

    public $hidden = ['uzytkownik','pytanie','pivot'];

    public function pytanie()
    {
        return $this->belongsToMany(pytanie::class, 'test_pytanie', 'id_test', 'id_pytanie');
    }

    public function uzytkownik()
    {
        return $this->belongsToMany(uzytkownik::class, 'test_uzytkownik', 'id_test', 'id_uzytkownik');
    }

    public function getTabeleZwiazane()
    {
        $wyniki = DB::table('wynik')->where('wynik.id_test', $this->id);
        $uzytkownicyZWynikami = DB::table('uzytkownik')
            ->join('test_uzytkownik', 'uzytkownik.id', '=', 'test_uzytkownik.id_uzytkownik')
            ->where('test_uzytkownik.id_test', $this->id)
            ->leftJoinSub($wyniki, 'wynik', function ($join) {
                $join->on('uzytkownik.id', '=', 'wynik.id_uzytkownik');
            })
            ->select('uzytkownik.*', 'wynik.wynik')
            ->get();
        return [
            'pytanie'=>$this->pytanie,
            'uzytkownik'=>$uzytkownicyZWynikami
        ];
    }
}
