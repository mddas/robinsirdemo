<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(){
        return view("home.body")->with(['products'=>Product::all(),'categories'=>Category::all(),'subcategories'=>Subcategory::all()]);
    }
    public function ajaxData(){
        $featured_products=Product::with('getSubcategory')->get();
        return response()->json(
            ['products'=>$featured_products,]
        );
    }
    public function returnAdmin(){
        return redirect("/admin");
    }
}
