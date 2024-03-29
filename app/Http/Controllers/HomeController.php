<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class HomeController extends Controller
{

    /* Return to the dashboad pos entry */

    public function dashboard()
    {
        $customers = Customer::all();
        return view('dashboard',['customers'=> $customers]);
    }

}
