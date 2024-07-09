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
        'chips_grade',
        'chips_up',
        'chips_total',
        'order_number',
        'transport',
        'type',
        'sub_total_bill',
        'total_bill',
        'paid_bill',
        'due_bill',
        'payment_type',
        'status',
        'order_date',
        'note',
        'chalan_number',
        'desc',
        'discount'
    ];

    protected $with=['customer'];




    /**
     * Get all of the comments for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer(){

        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
