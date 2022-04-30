<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{

    public function firstpay()
    {
        return view('paymentalert');

    }


    public function showForm()
    {
        return view('showform');

    }

    public function payment(Request $request)
    {
       Session::remove('price');
       Session::remove('gateway');

        Session::put('price',$request['price']);
        Session::put('gateway',$request['gateway']);


        return redirect(route('accept'));

    }


    public function accept()
    {
        if (Session::has('price') && Session::has('gateway')){
            return view('accept');
        }else{
            return redirect(route('firstpay'));
        }


    }
    //
}
