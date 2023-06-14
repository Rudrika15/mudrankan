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
}
