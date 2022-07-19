<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminTrackerController extends Controller
{
    public function index(){
        //dd(json_decode(Product::all()->first()['image']));
        $order = Order::all();//;->first();
        //return view("dashboard.order")->with(["alldata"=>$order]); 
        return view('dashboard/trace_user')->with(["alldata"=>$order]);   
    }

    public function update(Request $req){
        //dd($req);// :This is update";

        $orderObj = Order::find($req['id']);
        $orderObj =  $orderObj->update(['payment_type'=>$req['payment_type']]);
        return $orderObj;
        
    }

    public function delete(Request $req){
        //return $req." :this is delete";
        $orderObj = Order::find($req['id']);
        $orderObj->delete();
        return redirect("trace_user");

    }
    public function cancel(Request $req){
        //here 1 means cancel and 0 means not cancel
        $orderObj =  Order::find($req['id']);
        $orderObj = $orderObj->update(['cancel'=>$req['cancel']]);
        return $orderObj;

    }

}
