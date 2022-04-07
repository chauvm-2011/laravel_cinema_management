<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleShowtimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_showtimes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('movie_schedule_id')->unsigned();
            $table->foreign('movie_schedule_id')->references('id')->on('movie_schedules');
            $table->integer('movie_showtime_id')->unsigned();
            $table->foreign('movie_showtime_id')->references('id')->on('movie_showtimes');
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
        Schema::dropIfExists('schedule_showtimes');
    }
}
