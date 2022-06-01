<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wynik extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'wynik';
    public $fillable = [
       'id_test',
       'id_uzytkownik',
       'wynik'
    ];
}
