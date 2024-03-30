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
class ReportController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function due(Request $request)
    {
        $customers = Customer::whereHas('orders', function (Builder $query) {
            $query->where('due_bill', '>', 0);
        })->where(function (Builder $query) {
            $query->whereHas('orders', function (Builder $subquery) {
                $subquery->where('due_bill', '>', 0);
            });
        })->get();

        return view('reports.due', [
            'customers' => $customers
        ]);
    }



    /**
     * Display the user's profile form.
     */
    public function daily(Request $request)
    {

        return Order::whereDate('order_date', Carbon::today())->get();
        if ($request->ajax()) {
        }

        return view('reports.daily');
    }

}
