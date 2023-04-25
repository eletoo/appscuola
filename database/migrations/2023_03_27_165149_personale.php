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
        Schema::create('personale', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('sede_id')->unsigned();
            $table->string('ruolo');
        });

        Schema::table('personale', function (Blueprint $table){
            $table->foreign('sede_id')->references('id')->on('sede');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personale');
    }
};
