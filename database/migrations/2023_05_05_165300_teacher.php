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
        Schema::create('teacher', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('firstname');
            $table->string('lastname');
            $table->string('role');
            $table->integer('site_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned();
        });

        Schema::table('teacher', function (Blueprint $table){
            $table->foreign('site_id')->references('id')->on('site')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher');
    }
};
