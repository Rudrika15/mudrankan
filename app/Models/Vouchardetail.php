<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vouchardetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'voucharmaster_id',
        'vouchar_code',
        'status',
    ];
}
