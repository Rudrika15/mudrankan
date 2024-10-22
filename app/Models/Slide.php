<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'text',
        'button',
        'text_position',
        'text_color',
        'button_color',
        'background_color',
        'indicator_color',
        'image',
        'image_fit',
        'product_id',
        'market_id',
        'enabled',
    ];
    public function market()
    {
        return $this->belongsTo(Market::class, 'market_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}