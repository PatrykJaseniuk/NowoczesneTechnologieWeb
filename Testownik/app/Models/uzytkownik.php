<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(klasa::class, 'uzytkownik_klasa', 'id_uzytkownik','id_klasa');
    }

    public function test()
    {
        return $this->belongsToMany(test::class, 'test_uzytkownik', 'id_uzytkownik','id_test');
    }

    public function getTabeleZwiazane()
    {
        return ['klasa'=>$this->klasa,
                'test'=>$this->test
            ];
    }
}
