<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldToMovieShowtimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie_showtimes', function (Blueprint $table) {
            $table->dropForeign('movie_showtimes_movie_schedule_id_foreign');
            $table->dropColumn('movie_schedule_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movie_showtimes', function (Blueprint $table) {
            $table->integer('movie_schedule_id')->unsigned();
            $table->foreign('movie_schedule_id')->references('id')->on('movie_showtimes');
        });
    }
}
