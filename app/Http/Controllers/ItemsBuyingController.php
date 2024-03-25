<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentOTP;
use App\Mail\OrderInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Paymentinfo as PaymentInfoModel;
use App\Models\Selluserinfo as SelluserInfoModel;
use App\Models\Orders as OrderModel;
use App\Models\Sellproductinfo as SellproductInfoModel;
use App\Models\Sellitems as SellitemsModel;


class ItemsBuyingController extends Controller
{
    //

    public function viewPayment()
    {
        Session::put('web_urls', request()->fullUrl());
        $cart = Session::get('cart', []);
        if (Auth::check()) {
            if ($cart) {
                return view('pages.website.pages.payment.payment');
            } else {
                return redirect('/viewproductcategory')->with('success', 'Please add items to your cart');
            }
        } else {
            return redirect('/login')->with('success', 'Please login first');
        }
    }
    public function payment(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'address' => 'required',
            'message' => 'required',
            'cardholder' => 'required',
            'cardnumber' => 'required',
            'expmonth' => 'required',
            'expyear' => 'required',
            'securitycode' => 'required',
        ]);
        $my_id = Auth::id();
        $subtotal = Session::get('subtotal', []);
        $pay = new PaymentInfoModel();
        $randomNumber = rand(1000, 9999); // Generate a random number between 1000 and 9999 (inclusive)

        $pay->uId = $my_id;
        $pay->holder = $request->cardholder;
        $pay->amount = $subtotal;
        $pay->card_number = $request->cardnumber;
        $pay->security_code = $request->securitycode;
        $pay->exp_month = $request->expmonth;
        $pay->exp_year = $request->expyear;
        $pay->remember_token = $randomNumber;
        $pay->status = 0;

        $pay->save();
        $payId = $pay->id;

        if (!empty($pay)) {
            Mail::to($request->email)->send(new PaymentOTP($pay));
            // return redirect()->back()->with(['status' => "Please check your email inbox"]);
        }
        // else
        // {
        //     return redirect()->back()->withErrors(['email' => "We can't find a user with that email address."]);
        // }

        Session::get('tem_payment_data', []);
        $data = ([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'message' => $request->message,
            'cardholder' => $request->cardholder,
            'cardnumber' => $request->cardnumber,
            'expmonth' => $request->expmonth,
            'expyear' => $request->expyear,
            'securitycode' => $request->securitycode,
            'payId' => $payId,
            'subtotal' => $subtotal,
        ]);
        Session::put('tem_payment_data', $data);
        return $data;
    }

    public function viewConfirmPaymentOTP()
    {
        $tem_data = Session::get('tem_payment_data', []);
        if ($tem_data) {
            return view('pages.website.pages.payment.confirmotp');
        } else {
            return view('pages.website.pages.payment.payment');
        }
    }
    public function paymentOTP(Request $request)
    {
        $request->validate([
            'orderotp' => 'required',
        ]);
        $my_id = Auth::id();
        $cart = Session::get('cart', []);
        $tem_data = Session::get('tem_payment_data', []);
        $tem_pay_id = $tem_data['payId'];
        $req_OTP = $request->orderotp;
        $payData = PaymentInfoModel::find($tem_pay_id);
        $orderUserInfo = new SelluserInfoModel();
        $newOrder = new OrderModel();
        $SellproductInfo = new SellproductInfoModel();

        if ($req_OTP == $payData->remember_token) {

            $orderUserInfo->uId = $my_id;
            $orderUserInfo->name = $tem_data['name'];
            $orderUserInfo->phone = $tem_data['phone'];
            $orderUserInfo->delivery_address = $tem_data['address'];
            $orderUserInfo->email = $tem_data['email'];
            $orderUserInfo->message = $tem_data['message'];
            $orderUserInfo->status = 1;
            $orderUserInfo->save();
            $userInfoId = $orderUserInfo->id;

            foreach ($cart as $item) {
                $SellproductInfo = new SellproductInfoModel();
                $stockproduct = SellitemsModel::find($item['id']);
                $stockproduct->qty =  $stockproduct->qty - $item['quantity'];
                $stockproduct->save();

                $SellproductInfo->uId = $my_id;
                $SellproductInfo->catId = $item['catId'];
                $SellproductInfo->pId = $item['id'];
                $SellproductInfo->uInfoId = $userInfoId;
                $SellproductInfo->payInfoId = $payData->id;
                $SellproductInfo->unit_price = $item['price'];
                $SellproductInfo->qty = $item['quantity'];
                $SellproductInfo->total = $tem_data['subtotal'];
                $orderUserInfo->status = 1;

                $SellproductInfo->save();
            }

            $newOrder->uId = $my_id;
            $newOrder->payInfoId = $payData->id;
            $newOrder->uInfoId = $userInfoId;
            $newOrder->sellProductId = 1;
            $newOrder->total = $tem_data['subtotal'];
            $newOrder->notes = "successfully";
            $newOrder->status = 1;
            $newOrder->save();

            $payData->status = 1;
            $payData->save();

            if (!empty($newOrder)) {
                Mail::to($tem_data['email'])->send(new OrderInfo($newOrder));
            }

            Session::forget('cart');
            Session::forget('tem_payment_data');
            Session::forget('subtotal');


            return redirect('/viewproductcategory')->with('success', 'Your order has been saved successfully');
        } else {
            return redirect()->back()->with('success', 'Somthing wrong');
        }
    }
}
