<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShoapdetailController extends Controller
{
    public function index(Request $req){
         $productObj=Product::find($req)->first();
         return view('home.shoap-details')->with(['product'=>$productObj]);
    }
}
