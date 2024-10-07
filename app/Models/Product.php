<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'discount_price',
        'description',
        'capacity',
        'unit',
        'package_count',
        'category',
        'market',
        'featured',
        'deliverable_product',
        'image',
    ];
    public function carts()
    {
        return $this->hasMany(Cart::class, 'id','product_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
    public function coupons()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function galleries()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
