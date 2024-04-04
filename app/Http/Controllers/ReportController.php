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
        ]);
    }



    /**
     * Display the user's profile form.
     */
    public function daily(Request $request)
    {

        if ($request->ajax()) {
            if ($request->today) {
                $targatedDate = $request->today;
            }else{
                $targatedDate = Carbon::today();
            }
            $orders =  Order::whereDate('order_date', $targatedDate)->get();
            return datatables()->of($orders)->make(true);
        }

        return view('reports.daily');
    }

    /**
     * Display the user's profile form.
     */
    public function cash(Request $request)
    {

        if ($request->ajax()) {
            $formdtae = $request->weekago;
            $todate = $request->today;
            $orders =  Order::whereBetween('order_date', [$formdtae, $todate])->where('due_bill', 0)->get();
            return datatables()->of($orders)->make(true);
        }

        return view('reports.cash');
    }

    /**
     * Display the user's profile form.
     */
    public function daterange(Request $request)
    {

        if ($request->ajax()) {
            $formdtae = $request->weekago;
            $todate = $request->today;
            $orders =  Order::whereBetween('order_date', [$formdtae, $todate])->get();
            return datatables()->of($orders)->make(true);
        }

        return view('reports.daterange');
    }

}
