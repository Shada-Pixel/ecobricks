<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_id',
        'brick_qty',
        'brick_grade',
        'brick_up',
        'brick_total',
        'chips_qty',
        'chips_up',
        'chips_total',
        'order_number',
        'transport',
        'type',
        'total_bill',
        'paid_bill',
        'due_bill',
        'payment_type',
        'status',
        'order_date',
    ];
}
