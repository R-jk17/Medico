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
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id();
            // $table->date('date');
            $table->string('medicament1');
            $table->float('dosemedicament1');
            $table->integer('dureemedicament1');
            $table->string('medicament2')->default(null)->nullable();
            $table->float('dosemedicament2')->default(null)->nullable();
            $table->integer('dureemedicament2')->default(null)->nullable();
            $table->string('medicament3')->default(null)->nullable();
            $table->float('dosemedicament3')->default(null)->nullable();
            $table->integer('dureemedicament3')->default(null)->nullable();
            $table->string('medicament4')->default(null)->nullable();
            $table->float('dosemedicament4')->default(null)->nullable();
            $table->integer('dureemedicament4')->default(null)->nullable();
            $table->string('medicament5')->default(null)->nullable();
            $table->float('dosemedicament5')->default(null)->nullable();
            $table->integer('dureemedicament5')->default(null)->nullable();
            //$table->unsignedBigInteger('Ndossier');
            //$table->foreign('Ndossier')->references('id')->on('dossiers')->onDelete('cascade');
            //$table->unsignedBigInteger('Ndossier')->unsigned()->index()->nullable();
            //$table->foreign('Ndossier')->references('id')->on('dossiers')->onDelete('cascade');

            $table->unsignedBigInteger('dossier_id');
            $table->foreign('dossier_id')->references('id')->on('dossiers')->onDelete('cascade');
    
           
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordonnances');
    }
};
