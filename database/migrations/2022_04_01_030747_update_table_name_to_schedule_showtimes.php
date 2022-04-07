<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableNameToScheduleShowtimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule_showtimes', function (Blueprint $table) {
            Schema::rename('schedule_showtimes', 'movie_schedule_movie_showtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule_showtimes', function (Blueprint $table) {
            Schema::rename('movie_schedule_movie_showtime', 'schedule_showtimes');
        });
    }
}
