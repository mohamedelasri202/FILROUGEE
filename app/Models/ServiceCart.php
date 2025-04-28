<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCart extends Model
{
    use HasFactory;
    protected $table = 'servicecart';
    protected $fillable = [
        'service_id',
        'user_id',
        'status',
        'booking_time',
        'booking_date'
    ];
}
