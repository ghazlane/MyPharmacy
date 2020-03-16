<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DemandesMedicaments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('demandes_medicaments', function (Blueprint $table) {
            $table->bigIncrements('id_demande');
            $table->string('date_demande');
            $table->bigInteger('id_pharmacie');
            $table->string('ordonnance');
            $table->string('cin'); 
            $table->string('etat_demande');
            $table->string('heure_retour');
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
        Schema::dropIfExists('demandes_medicaments');
    }
}

