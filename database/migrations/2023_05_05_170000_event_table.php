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
            $table->date('day_of_week'); //day between -5 weeks and +5 weeks (see EventFactory)
            $table->integer('hour_of_schoolday')->unsigned(); //from 1 to 6 
            $table->integer('substitute_id')->unsigned()->nullable(); //teacher_id of the substitute teacher
            $table->boolean('certificate'); // true if the event has been associated to a certificate by the teacher
        });

        Schema::table('event', function (Blueprint $table){
            $table->foreign('teacher_id')->references('id')->on('teacher');
            $table->foreign('substitute_id')->references('id')->on('teacher');
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
