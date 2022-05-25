<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pytanie extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'pytanie';
    public $fillable = [
        'tresc',
        'odpowiedz_a',
        'odpowiedz_b',
        'odpowiedz_c',
        'odpowiedz_d',
        'prawidlowa_odpowiedz',
    ];

    protected $hidden = ['test', 'pivot'];

    //to do:
    /**
     * The uczniowie that belong to the klasa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function test()
    {
        return $this->belongsToMany(test::class, 'test_pytanie', 'id_pytanie', 'id_test');
    }
    // public function odpowiedz()
    // {
    //     return $this->belongsToMany(uzytkownik::class, 'uzytkownik_klasa', 'id_klasa', 'id_uzytkownik');
    // }

    public function getTabeleZwiazane()
    {
        return $tabeleZwiazane=['test'=>$this->test];
    }
}
