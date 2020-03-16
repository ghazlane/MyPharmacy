<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num_ordre')->unique(); 
            $table->string('telephone_fixe');
            $table->string('password');
            $table->string('localisation_d'); 
            $table->string('localisation_g'); 
            $table->string('categorie'); 
            $table->string('adresse'); 
            $table->string('ville');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
