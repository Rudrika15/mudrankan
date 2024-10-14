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
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function markets()
    {
        return $this->belongsTo(Market::class, 'market_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // Relationship with discountables
    public function discountables()
    {
        return $this->hasMany(Discountable::class);
    }
}
