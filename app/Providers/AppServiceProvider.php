<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $order = Order::whereNotNull('customer_id')->latest()->first();
        if ($order && $order->customer) {
            $latic = $order->customer->name;
            $ud = date('d-M-y', strtotime($order->updated_at));
            $cn = Order::whereNotNull('chalan_number')->latest()->value('chalan_number');
        }else{
            $latic = 'N/A';
            $ud = 'N/A';
            $cn = 0;
        }

        $tb =  Order::sum('brick_qty');
        $tc =  Order::sum('chips_qty');
        $pendingOrder = Order::where('status', 1)->count();

        {{  }}
        // Share variable with all views
        View::share('lastc',$latic);
        View::share('ud',$ud);
        View::share('cn',$cn);
        View::share('tb',$tb);
        View::share('tc',$tc);
        View::share('pendingOrder',$pendingOrder);
    }
}
