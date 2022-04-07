<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieShowtime extends Model
{
    use HasFactory;
//    protected $table = 'schedule_showtime';

    protected $fillable = [
        'start_time',
        'end_time',
    ];

    public function movieschedules()
    {
        return $this->belongsToMany(MovieSchedule::class);
    }
}
