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
        Schema::create('timetable', function (Blueprint $table){
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->string('day_of_week');
            $table->integer('hour_of_schoolday')->unsigned();
            $table->string('class')->nullable();
            
            $table->unique(["teacher_id", "day_of_week", "hour_of_schoolday"]);
        });

        Schema::table('timetable', function(Blueprint $table){
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
        Schema::dropIfExists('timetable');
    }
};
