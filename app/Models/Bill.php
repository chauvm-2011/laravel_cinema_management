<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public const BILLPUBLIC = 1;
    public const BILLPRIVATE = 0;

    protected $fillable = [
        'total_money',
        'status',
        'user_id',
        'discount_id',
    ];
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
