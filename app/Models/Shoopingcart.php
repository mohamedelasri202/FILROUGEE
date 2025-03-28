<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoopingcart extends Model
{
    use HasFactory;
    protected $table = 'shoopingcart';
    protected $fillable = [
        'product_id',
        'quantity',
        'user_id',
        'type',

    ];
}
