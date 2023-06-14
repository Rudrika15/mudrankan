<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucharmaster extends Model
{
    use HasFactory;
    protected $fillable = [
        'vouchar_name',
        'vouchar_prize',
        'vouchar_expiry',
        'vouchar_associated_mobile',
        'quantity',
        'vouchar_status',
    ];
}
