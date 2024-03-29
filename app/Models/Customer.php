<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    // protected $with = [
    //     'orders'
    // ];



    /**
     * Get all of the comments for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(){

        return $this->hasMany(Order::class, 'customer_id', 'id');
    }


    // Total purchase ammount of this customer
    public function totalbill()
    {
        return $this->orders()->sum('total_bill');
    }

    public function paidbill()
    {
        return $this->orders()->sum('paid_bill');
    }

    public function duebill()
    {
        return $this->orders()->sum('due_bill');
    }
    public function bricks()
    {
        return $this->orders()->sum('brick_qty');
    }
    public function chips()
    {
        return $this->orders()->sum('chips_qty');
    }
}
