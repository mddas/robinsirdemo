<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Shippingaddress;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserdashboardController extends Controller
{
    /*now not in use
    public function dashBoard(){
        return "this is UserdashboardController";
    }

    public function orDer(){
        $orders = Cart::where('user_id',Auth::user()->id)
                        ->where('payment',1) 
                        ->with('getProduct')
                        ->with('getShippingAddress')
                        ->get();
        //return $orders[0]->getShippingAddress;
        return view("home/order")->with(["orders"=>$orders]);
    }
    */
}
