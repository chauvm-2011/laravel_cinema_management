<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieShowtimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie_showtimes')->insert([
            [
                'start_time' => '08:00:00',
                'end_time' => '10:00:00',
            ],
            [
                'start_time' => '10:30:00',
                'end_time' => '12:30:00',
            ],
            [
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
            ],
            [
                'start_time' => '15:30:00',
                'end_time' => '17:30:00',
            ],
            [
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
            ],
            [
                'start_time' => '20:30:00',
                'end_time' => '22:30:00',
            ],
        ]);
    }
}
