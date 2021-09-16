<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_time',
        'end_time',
        'date',
        'movie_id',
        'room_id',
    ];
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}