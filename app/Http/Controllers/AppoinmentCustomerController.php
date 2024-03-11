<?php

namespace App\Http\Controllers;

use App\Models\NewAppoinments as NewAppoinments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppoinmentCustomerController extends Controller
{
    //
    public function appoinmentCustomer()
    {
        if (Auth::check()) {
            $my_id = Auth::id();
            $appoinment = NewAppoinments::where('uId', $my_id)->get();
            return view('pages.appoinments.appoinmentcustomer', ['result' => $appoinment]);
        } else {
            return redirect('/');
        }
    }
}
