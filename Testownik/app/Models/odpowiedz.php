<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class odpowiedz extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'odpowiedz';
    public $fillable = [
        'id_test',
       'id_pytanie',
       'id_uzytkownik',
       'odpowiedz'
    ];

    protected $hidden = ['uzytkownik', 'pivot'];

    //to do:
    /**
     * The uczniowie that belong to the klasa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function test()
    {
        return $this->belongsToMany(uzytkownik::class, 'uzytkownik_klasa', 'id_klasa', 'id_uzytkownik');
    }
    public function uzytkownik()
    {
        return $this->belongsToMany(uzytkownik::class, 'uzytkownik_klasa', 'id_klasa', 'id_uzytkownik');
    }
    public function pytanie()
    {
        return $this->belongsToMany(uzytkownik::class, 'uzytkownik_klasa', 'id_klasa', 'id_uzytkownik');
    }

    public function getTabeleZwiazane()
    {
        return $tabeleZwiazane=[];
    }
}
