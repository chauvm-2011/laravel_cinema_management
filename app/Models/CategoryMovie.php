<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    use HasFactory;
    protected $table = 'category_movie';
    protected $fillable = [
        'movie_id',
        'category_id',
    ];
}
