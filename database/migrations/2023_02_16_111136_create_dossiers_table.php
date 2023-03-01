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
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('nompatient')->default(null)->nullable();
            $table->string('prenompatient')->default(null)->nullable();
            $table->string('gender')->default(null)->nullable();
            $table->date('datenaissance')->default(null)->nullable();
            $table->string('situation')->default(null)->nullable();
            $table->integer('tlfp')->default(null)->nullable();
            $table->string('addressp')->default(null)->nullable();
            $table->integer('taille')->default(null)->nullable();
            $table->float('poids')->default(null)->nullable();
            $table->string('groupesang')->default(null)->nullable();
            $table->string('Maladiechronique')->default(null)->nullable();
            $table->string('allergie')->default(null)->nullable();
            $table->string('allergiemedi')->default(null)->nullable();
            $table->string('antemedi')->default(null)->nullable();
            $table->string('antechir')->default(null)->nullable();
            $table->string('traitment')->default(null)->nullable();
            $table->date('datedebuttraitement')->default(null)->nullable();

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
        Schema::dropIfExists('dossiers');
    }
};
