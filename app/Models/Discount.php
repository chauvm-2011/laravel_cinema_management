<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'sales_off',
        'start_date',
        'end_date',
    ];
    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
