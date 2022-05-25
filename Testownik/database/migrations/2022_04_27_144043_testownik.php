<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klasa', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa')->unique();
        });


        Schema::create('uzytkownik', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('password');
            $table->string('typ');
        });

        Schema::create('uzytkownik_klasa', function(Blueprint $table){
            $table ->id();
            $table->bigInteger('id_klasa')->unsigned();
            $table->bigInteger('id_uzytkownik')->unsigned();
            $table->foreign('id_klasa', 'klucz_obcy_id_klasa')->references('id')->on('klasa')->onDelete('cascade');
            $table->foreign('id_uzytkownik', 'klucz_obcy_id_uzytkownik')->references('id')->on('uzytkownik')->onDelete('cascade');
        });


        Schema::create('test', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->date('data_rozpoczecia')->nullable();
            $table->date('data_zakonczenia')->nullable();
            $table->interval('czas_trwania')->nullable();
        });

        Schema::create('pytanie', function (Blueprint $table) {
            $table->id();
            $table->string('tresc');
            $table->string('odpowiedz_a');
            $table->string('odpowiedz_b');
            $table->string('odpowiedz_c');
            $table->string('odpowiedz_d');
            $table->string('prawidlowa_odpowiedz');
        });

        // Schema::create('test_uczen_pytanie', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('tresc');
        // });

        Schema::create('odpowiedz', function(Blueprint $table){
            $table ->id();
            $table->bigInteger('id_test')->unsigned();
            $table->bigInteger('id_pytanie')->unsigned();
            $table->bigInteger('id_uzytkownik')->unsigned();
            $table->string('odpowiedz');
            $table->foreign('id_test', 'klucz_obcy_id_test')->references('id')->on('test')->onDelete('cascade');
            $table->foreign('id_pytanie', 'klucz_obcy_id_pytanie')->references('id')->on('pytanie')->onDelete('cascade');
            $table->foreign('id_uzytkownik', 'klucz_obcy_id_uczen')->references('id')->on('uzytkownik')->onDelete('cascade');
        });

        Schema::create('wynik', function(Blueprint $table){
            $table ->id();
            $table->bigInteger('id_test')->unsigned();
            $table->bigInteger('id_uzytkownik')->unsigned();
            $table->bigInteger('wynik');
            $table->foreign('id_test', 'klucz_obcy_id_test')->references('id')->on('test')->onDelete('cascade');
            $table->foreign('id_uzytkownik', 'klucz_obcy_id_uczen')->references('id')->on('uzytkownik')->onDelete('cascade');
        });

        Schema::create('test_uzytkownik', function(Blueprint $table){
            $table ->id();
            $table->bigInteger('id_test')->unsigned();
            $table->bigInteger('id_uzytkownik')->unsigned();
            $table->foreign('id_test', 'klucz_obcy_id_test')->references('id')->on('test')->onDelete('cascade');
            $table->foreign('id_uzytkownik', 'klucz_obcy_id_uczen')->references('id')->on('uzytkownik')->onDelete('cascade');
        });

        Schema::create('test_pytanie', function(Blueprint $table){
            $table ->id();
            $table->bigInteger('id_test')->unsigned();
            $table->bigInteger('id_pytanie')->unsigned();
            $table->foreign('id_test', 'klucz_obcy_id_test')->references('id')->on('test')->onDelete('cascade');
            $table->foreign('id_pytanie', 'klucz_obcy_id_pytanie')->references('id')->on('pytanie')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wynik');
        Schema::dropIfExists('uzytkownik_klasa');
        Schema::dropIfExists('test_pytanie');
        Schema::dropIfExists('test_uzytkownik');
        Schema::dropIfExists('odpowiedz');
        Schema::dropIfExists('uzytkownik');
        Schema::dropIfExists('nauczyciel');
        Schema::dropIfExists('test');
        Schema::dropIfExists('pytanie');
        Schema::dropIfExists('klasa');
    }
};
