<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function wishlist()
    {
        return $this->hasOne(Wishlist::class, 'product_id', 'product_id');
    }
}
