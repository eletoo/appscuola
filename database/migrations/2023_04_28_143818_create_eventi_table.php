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
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data_inizio');
            $table->dateTime('data_fine');
            $table->text('descrizione')->nullable();
            $table->boolean('assente');
            $table->boolean('occupato');
            $table->integer('sede_id')->unsigned();
            $table->integer('docente_id')->unsigned();

            $table->foreign('sede_id')->references('id')->on('sede');
            $table->foreign('docente_id')->references('id')->on('personale');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento');
    }
};
