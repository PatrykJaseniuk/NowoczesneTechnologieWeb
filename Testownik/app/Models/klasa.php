<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klasa extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'klasa';
    public $fillable = [
        'nazwa'
    ];

    protected $hidden = ['uzytkownik', 'pivot'];

    /**
     * The uczniowie that belong to the klasa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function uzytkownik()
    {
        return $this->belongsToMany(uzytkownik::class, 'uzytkownik_klasa', 'id_klasa', 'id_uzytkownik');
    }

    public function getTabeleZwiazane()
    {
        return $tabeleZwiazane=['uzytkownik'=>$this->uzytkownik];
    }
}
