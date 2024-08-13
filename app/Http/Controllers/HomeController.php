<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class HomeController extends Controller
{

    /* Return to the dashboad pos entry */

    public function dashboard()
    {
        $customers = Customer::orderBy('name', 'asc')->get();
        return view('dashboard',['customers'=> $customers]);
    }
    /* Return to the dashboad pos entry */

    public function home()
    {
        return view('home');
    }

}
