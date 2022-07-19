<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        //dd(json_decode(Product::all()->first()['image']));
        return view('dashboard/product')->with(["alldata"=>Product::all()]);   
    }

    public function ProductAdd(){
        return view("dashboard/product_add");
    }

    public function  insert(Request $req){
        //dd($req);
        $validated = $req->validate([
        'name' => 'required',
        'category' => 'required',
        'image'=>'required',
            ]);

        if($req->file('image')){
                //return($req->file('image'));
                $file= $req->file('image');
                $fileName = [];
                foreach($file as $file){
                    $name = date('YmdHi').$file->getClientOriginalName();
                    $file-> move(public_path('product'), $name);
                    //return $name;
                    array_push($fileName,$name);
                }

                $fileName=json_encode($fileName);
                //dd($fileName);
            }
            else{
                $fileName="null";
            }
        $productAdd = Product::updateOrCreate(
            ['id' => $req['id']],
            [
            'name'=>$req['name'],
            'category'=>$req['category'],
            "image"=>$fileName,
        ]);
        if($productAdd){
            Session::flash('insertMessage', 'Inserted successfully!');
            return redirect("products");
        }
    }

    public function destroy(Request $req){
        $ProductObj = Product::find($req['id']);
        $ProductObj->delete();
        return redirect('products');
    }

   
}
