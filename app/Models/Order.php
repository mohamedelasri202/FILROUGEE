<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'address',
        'city',
        'type',
        'payment_method',
        'shoopingcart_id',
        'servicecart_id',
        'user_id',
        'quantity',
        'status',
        'total'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
