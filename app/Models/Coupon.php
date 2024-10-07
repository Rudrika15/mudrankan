<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_type',
        'discount',
        'discription',
        'expire_at',
        'enabled',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function markets()
    {
        return $this->hasMany(Market::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // Relationship with discountables
    public function discountables()
    {
        return $this->hasMany(Discountable::class);
    }
}
