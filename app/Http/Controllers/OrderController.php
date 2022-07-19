<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function order(){
    $order = Order::where('user_id',Auth::user()->id)->get();//;->first();
    //dd($order[0]);
    //return dd(json_decode($order['products'])[0]);
     return view("dashboard.order")->with(["alldata"=>$order]); 
  }

  public static function isOrder(){
        return Order::where('user_id',Auth::user()->id)->get()->count();
    }

    public function track(Request $req){
      $tracked=Order::where('order_id',$req['order_id'])->first();
      //return json_decode($tracked['products'],true)[0]['get_shipping_address'];
      return view('home.track')->with(["orders"=>$tracked]);
    }
}
