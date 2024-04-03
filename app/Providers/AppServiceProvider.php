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
        }else{
            $latic = 'N/A';
            $ud = 'N/A';
        }

        {{  }}
        // Share variable with all views
        View::share('lastc',$latic);
        View::share('ud',$ud);
    }
}
