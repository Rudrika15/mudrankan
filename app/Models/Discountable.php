<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discountable extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_id',
        'discountable_type',
        'discountable_id',
    ];
}
