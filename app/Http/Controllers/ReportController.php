<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use App\Models\Customer;
use App\Models\Order;
use Carbon\Carbon;
use DataTables;

class ReportController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function due(Request $request)
    {
        $customers = Customer::all();
        $targatedDate = Carbon::today();
        $filteredCustomers = $customers->filter(function ($customer) {
            return $customer->duebill() != 0;
        });

        $pay = 0;
        $ric = 0;

        foreach ($customers as $customer) {
            if ($customer->duebill() > 0) {
                $ric += $customer->duebill();
            }
        }
        foreach ($customers as $customer) {
            if ($customer->duebill() < 0) {
                $pay -= $customer->duebill();
            }
        }



        return view('reports.due', [
            'customers' => $filteredCustomers,
            'pay' => $pay,
            'ric' => $ric,
            'targatedDate'=>$targatedDate,
        ]);
    }



    /**
     * Display the user's profile form.
     */
    public function daily(Request $request)
    {

        if ($request->today) {
            $targatedDate = $request->today;
        }else{
            $targatedDate = Carbon::today();
        }
        $orders =  Order::whereDate('order_date', $targatedDate)->get();

        if ($request->ajax()) {
            return datatables()->of($orders)->make(true);
        }

        return view('reports.daily',['orders'=>$orders,'targatedDate' => $targatedDate]);
    }

    /**
     * Display the user's profile form.
     */
    public function cash(Request $request)
    {
        $formdtae = Carbon::now()->subWeek();
        $todate = Carbon::today();
        if ($request->weekago) {
            $formdtae = $request->weekago;
        }
        if ($request->today) {
            $todate = $request->today;
        }

        $orders =  Order::whereBetween('order_date', [$formdtae, $todate])->where('due_bill', 0)->get();
        return view('reports.cash',['orders'=> $orders, 'formdtae'=>$formdtae, 'todate'=>$todate]);
    }

    /**
     * Display the user's profile form.
     */
    public function lsakes(Request $request)
    {

        $formdtae = Carbon::now()->subWeek();
        $todate = Carbon::today();
        if ($request->weekago) {
            $formdtae = $request->weekago;
        }
        if ($request->today) {
            $todate = $request->today;
        }
        $orders =  Order::whereBetween('order_date', [$formdtae, $todate])->where('customer_id','!=', NULL)->get();

        return view('reports.ls',['orders'=> $orders, 'formdtae'=>$formdtae, 'todate'=>$todate]);
    }

    /**
     * Display the user's profile form.
     */
    public function daterange(Request $request)
    {
        $formdtae = Carbon::now()->subWeek();
        $todate = Carbon::today();
        if ($request->weekago) {
            $formdtae = $request->weekago;
        }
        if ($request->today) {
            $todate = $request->today;
        }

        $orders =  Order::whereBetween('order_date', [$formdtae, $todate])->get();
        return view('reports.daterange',['orders'=> $orders, 'formdtae'=>$formdtae, 'todate'=>$todate]);
    }

}
