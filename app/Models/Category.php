<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}