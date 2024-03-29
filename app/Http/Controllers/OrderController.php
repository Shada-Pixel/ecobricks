<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index',['orders'=> $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {

        $order = new Order;

        if($request->customer_id){
            $order->customer_id = $request->customer_id;
        }
        $order->brick_qty = $request->brick_qty;
        $order->brick_grade = $request->grade;
        $order->brick_up = $request->brick_up;
        $order->brick_total = $request->bricks_total;
        $order->chips_qty = $request->chip_qty;
        $order->chips_up = $request->chip_up;
        $order->chips_total = $request->chips_total;
        $order->order_number = time();
        $order->transport = $request->transport;
        $order->type = $request->order_type;
        $order->total_bill = $request->subtotal;
        $order->paid_bill = $request->paid;
        $order->due_bill = $request->due;

        if ($request->due <= 0) {
            $order->payment_type = 1;
        }else{
            $order->payment_type = 2;
        }

        if ($request->due != 0) {
            $order->status = 1;
        }

        $order->order_date = $request->orderdate;
        $order->save();

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
