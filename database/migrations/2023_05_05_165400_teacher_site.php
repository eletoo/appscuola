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
        Schema::create('teacher_site', function (Blueprint $table) {
            $table->integer('teacher_id')->unsigned();
            $table->integer('site_id')->unsigned();
        });

        Schema::table('teacher_site', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teacher');
            $table->foreign('site_id')->references('id')->on('site');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_site');
    }
};
