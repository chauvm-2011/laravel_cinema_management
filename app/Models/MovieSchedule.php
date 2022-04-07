<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'movie_id',
        'room_id',
    ];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function movieshowtimes()
    {
        return $this->belongsToMany(MovieShowtime::class);
    }
}
