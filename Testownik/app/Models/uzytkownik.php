<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class uzytkownik extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'uzytkownik';
    public $fillable = [
        'login',
        'imie',
        'nazwisko',
        'password',
        'typ'
    ];

    protected $hidden = ['test', 'klasa', 'pivot'];

    /**
     * The uczniowie that belong to the klasa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function klasa()
    {
        return $this->belongsToMany(klasa::class, 'uzytkownik_klasa', 'id_uzytkownik', 'id_klasa');
    }

    public function test()
    {
        return $this->belongsToMany(test::class, 'test_uzytkownik', 'id_uzytkownik', 'id_test');
    }

    public function getTabeleZwiazane()
    {
        $wyniki = DB::table('wynik')->where('wynik.id_uzytkownik', $this->id);
        $testyZWynikami = DB::table('test')
            ->join('test_uzytkownik', 'test.id', '=', 'test_uzytkownik.id_test')
            ->where('test_uzytkownik.id_uzytkownik', $this->id)
            ->leftJoinSub($wyniki, 'wynik', function ($join) {
                $join->on('test.id', '=', 'wynik.id_test');
            })
            ->select('test.*', 'wynik.wynik')
            ->get();

        return [
            'klasa' => $this->klasa,
            'test' => $testyZWynikami
        ];
    }
}
