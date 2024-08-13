<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->where('status', 2)->get();
        return view('orders.index',['orders'=> $orders]);
    }

    /**
     * Display a listing of the pending resource.
     */
    public function porder()
    {
        $orders = Order::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('orders.porder',['orders'=> $orders]);
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
        $order->chips_grade = $request->chips_grade;
        $order->chips_up = $request->chip_up;
        $order->chips_total = $request->chips_total;
        $order->order_number = time();
        $order->transport = $request->transport;
        $order->type = $request->order_type;
        $order->sub_total_bill = $request->subtotal;
        $order->discount = $request->discount;
        $order->total_bill = $request->total;
        $order->paid_bill = $request->paid;
        $order->due_bill = $request->due;
        $order->note = $request->note;
        $order->desc = $request->description;
        $order->chalan_number = $request->chalan_number;

        if ($request->due <= 0) {
            $order->payment_type = 1;
        }else{
            $order->payment_type = 2;
        }

        // if ($request->due != 0) {
        //     $order->status = 1;
        // }
        $order->status = 1;
        $order->order_date = $request->orderdate;
        $order->save();

        return redirect()->route('dashboard')->with('success', 'Record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show',['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $customers = Customer::orderBy('name', 'asc')->get();
        return view('orders.edit',['customers'=> $customers, 'order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {

        if($request->customer_id){
            $order->customer_id = $request->customer_id;
        }
        $order->brick_qty = $request->brick_qty;
        $order->brick_grade = $request->grade;
        $order->brick_up = $request->brick_up;
        $order->brick_total = $request->bricks_total;
        $order->chips_qty = $request->chip_qty;
        $order->chips_grade = $request->chips_grade;
        $order->chips_up = $request->chip_up;
        $order->chips_total = $request->chips_total;
        $order->transport = $request->transport;
        $order->type = $request->order_type;
        $order->sub_total_bill = $request->subtotal;
        $order->discount = $request->discount;
        $order->total_bill = $request->total;
        $order->paid_bill = $request->paid;
        $order->due_bill = $request->due;
        $order->desc = $request->description;

        if ($request->note) {
            # code...
            $order->note = $request->note;
        }
        if ($request->description) {
            # code...
            $order->desc = $request->description;
        }
        $order->chalan_number = $request->chalan_number;

        if ($request->due <= 0) {
            $order->payment_type = 1;
        }else{
            $order->payment_type = 2;
        }

        // if ($request->due != 0) {
        //     $order->status = 1;
        // }
        $order->status = 2;

        $order->order_date = $request->orderdate;
        $order->update();

        return redirect()->route('orders.index')->with('success', 'Information updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Record Deleted!');
    }
}
