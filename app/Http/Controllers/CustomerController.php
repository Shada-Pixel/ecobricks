<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

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
    public function show(Customer $customer)
    {
        return view('customers.show', ['customer'=>$customer]);
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
