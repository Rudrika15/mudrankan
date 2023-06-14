<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'address',
        'longitude',
        'latitude',
        'phone',
        'mobile',
        'information',
        'admin_commision',
        'delivery_fee',
        'delivery_range',
        'default_tax',
        'close',
        'active',
        'available_for_delivery',
    ];
}
