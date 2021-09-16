<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type_of_chair',
        'room_id',
    ];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
