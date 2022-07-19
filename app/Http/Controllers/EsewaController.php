<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsewaController extends Controller
{
    public function payment(){
        return view('home.esewa_payment');
    }

    public function paymentSuccess(){
        return "payment Success";
    }

    public function paymentFailed(){
        return "payment Failed";
    }
}
