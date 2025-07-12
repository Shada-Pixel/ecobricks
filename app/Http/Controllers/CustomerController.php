<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->get();
        // return $customers;
        return view('customers.index',['customers'=> $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {

        $customer = new Customer;

        $customer->name = $request->name;
        if ($request->email) {
            $customer->email = $request->email;
        }
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        // return $request;
        // Customer::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'address' => $request->address,
        // ]);
        return redirect()->route('customers.index')->with('success', 'Customer has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,Customer $customer)
    {
        if ($request->has('from_date') && $request->has('to_date')) {
            $from_date = $request->input('from_date');
            $to_date = $request->input('to_date');
            $orders = $customer->orders()
                ->whereBetween('order_date', [$from_date, $to_date])
                ->orderBy('order_date', 'DESC')
                ->get();

            // Get the balance() of last of $orders
            $last_order = $customer->orders()
                ->whereBetween('order_date', [$from_date, $to_date])
                ->latest()
                ->first();
            $footer_total_bill = $orders->sum('total_bill');
            $footer_paid_bill = $orders->sum('paid_bill');
            $footer_due_bill = floor($last_order ? $last_order->balance : 0);
            $footer_brick_qty = $orders->sum('brick_qty');
            $footer_chip_qty = $orders->sum('chips_qty');
        } else {
            $from_date = null;
            $to_date = null;
            $orders = $customer->orders()->orderBy('order_date', 'DESC')->get();

            $footer_total_bill = $customer->totalbill();
            $footer_paid_bill = $customer->paidbill();
            $footer_due_bill = $customer->duebill();
            $footer_brick_qty = $customer->bricks();
            $footer_chip_qty = $customer->chips();
        }

        return view('customers.show', [
            'customer'=>$customer,
            'orders' => $orders,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'footer_total_bill'=>$footer_total_bill,
            'footer_paid_bill'=>$footer_paid_bill,
            'footer_due_bill'=>$footer_due_bill,
            'footer_brick_qty'=>$footer_brick_qty,
            'footer_chip_qty'=>$footer_chip_qty,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', ['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        // return $request;
        $customer->name = $request->name;
        if ($request->email) {
            $customer->email = $request->email;
        }
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->update();
        return redirect()->route('customers.index')->with('success', 'Customer has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ( $customer->duebill() == 0) {
            # code...
            $customer->orders()->update(['customer_id' => null]);
            $customer->delete();
            return redirect()->route('customers.index')->with('success', 'Customer Deleted!');
        }

        return redirect()->route('customers.index')->with('error', 'Customer Have Due!');
    }
}
