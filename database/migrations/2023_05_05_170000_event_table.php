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
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('teacher_id')->unsigned();
            $table->text('description')->nullable();
            $table->string('day_of_week'); //MON, TUE, WED, THU, FRI, SAT
            $table->integer('hour_of_schoolday')->unsigned(); //from 1 to 6 
        });

        Schema::table('event', function (Blueprint $table){
            $table->foreign('teacher_id')->references('id')->on('teacher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
};
