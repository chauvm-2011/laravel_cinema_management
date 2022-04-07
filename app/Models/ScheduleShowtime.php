<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleShowtime extends Model
{
    use HasFactory;
    protected $table = 'movie_schedule_movie_showtime';
    protected $fillable = [
        'movie_schedule_id',
        'movie_showtime_id',
    ];
}
