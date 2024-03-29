<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            // Customer
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');

            // Brick
            $table->integer('brick_qty')->default(0);
            $table->tinyInteger('brick_grade')->default(1)->comment('1 => 1, 2 => 1.5');
            $table->integer('brick_up')->default(0);
            $table->integer('brick_total')->default(0);

            // Chips
            $table->integer('chips_qty')->default(0);
            $table->integer('chips_up')->default(0);
            $table->integer('chips_total')->default(0);

            // Order
            $table->integer('order_number')->uniqid();
            $table->tinyInteger('transport')->default(1)->comment('1 => Trolly, 2 => Truck, 3=> Alom Shadhu, 4 = Self');
            $table->tinyInteger('type')->default(1)->comment('1 => F, 2 => M');
            $table->integer('total_bill')->default(0);
            $table->integer('paid_bill')->default(0);
            $table->string('due_bill')->default(0);
            $table->tinyInteger('payment_type')->default(1)->comment('1 => cash, 2 => due');
            $table->tinyInteger('status')->default(2)->comment('1 => pending, 2 => complete');
            $table->date('order_date')->default(DB::raw('CURRENT_DATE'));

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
