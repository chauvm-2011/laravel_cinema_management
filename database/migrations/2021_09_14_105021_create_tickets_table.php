<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->integer('movie_schedule_id')->unsigned();
            $table->foreign('movie_schedule_id')->references('id')->on('movie_schedules');
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->integer('seat_id')->unsigned();
            $table->foreign('seat_id')->references('id')->on('seats');
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
        Schema::dropIfExists('tickets');
    }
}
