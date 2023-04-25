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
        Schema::create('personale_sede', function (Blueprint $table) {
            $table->integer('personale_id')->unsigned();
            $table->integer('sede_id')->unsigned();
        });

        Schema::table('personale_sede', function (Blueprint $table) {
            $table->foreign('personale_id')->references('id')->on('personale');
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
        Schema::dropIfExists('personale_sede');
    }
};
