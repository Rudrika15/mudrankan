<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllPayment extends Model
{
    use HasFactory;

    protected $table = "all_payments";

    protected $fillable = [
        'memberId',
        'razorpay_payment_id',
        'paymentType',
        'date',
        'paymentMode',
        'amount',
        'remarks',
        'status',
    ];

}
