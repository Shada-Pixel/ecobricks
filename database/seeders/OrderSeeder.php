<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Calculate the first day of last month
         $firstDayOfLastMonth = date('Y-m-d', strtotime('first day of last month'));

         for ($i = 0; $i < 200; $i++) {
             // Generate a random order date between the first day of last month and today
             $orderDate = date('Y-m-d', mt_rand(strtotime($firstDayOfLastMonth), time()));
             $randomCustomer = rand(1, 50);
             $randomCustomerWithNull = (rand(0, 5) == 1) ? $randomCustomer : null;
             $bq = rand(1000, 10000);
             $bup = 9.5;
             $bt= $bq * $bup;
             $cq = rand(0,150);
             $discount = rand(0,99);
             $cup = 100;
             $ct = $cq * $cup;

             $tb = $bt + $ct;
             $pb =  rand(0, $tb);
             $db = $tb - ($pb-$discount);

             $cid = $randomCustomerWithNull;
             if ($db != 0) {
                $cid = $randomCustomer;
             }

             DB::table('orders')->insert([
                'customer_id' => $randomCustomerWithNull, // Assuming you have 50 customers seeded
                'brick_qty' => $bq,
                'brick_grade' => rand(1, 3),
                'brick_up' => $bup,
                'brick_total' => $bt,
                'chips_qty' => $cq,
                'chips_grade' => rand(1,4),
                'chips_up' => $cup,
                'chips_total' => $ct,
                'order_number' => time()+$i,
                'transport' => rand(1, 4),
                'type' => rand(1, 2),
                'sub_total_bill' => $tb,
                'total_bill' => $tb-$discount,
                'paid_bill' => $pb,
                'due_bill' => $db,
                'note' => 'Sample note',
                'chalan_number' => 9240 + $i,
                'payment_type' => rand(1, 2),
                'status' => rand(1, 2),
                'order_date' => $orderDate,
                'desc' => 'Description of this order',
                'discount' => $discount
             ]);
         }
    }
}
