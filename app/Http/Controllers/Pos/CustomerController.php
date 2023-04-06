<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{



    public function customerAll(){
        $customers = Customer::latest()->get();
        return view('backend.customer.customer_all',compact('customers'));
    }

}
