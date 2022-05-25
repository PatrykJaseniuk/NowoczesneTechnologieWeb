<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $tabeleZwiazane=[
            'pytanie'=>$this->pytanie,
            'uzytkownik'=>$this->uzytkownik
        ];
    }
}
