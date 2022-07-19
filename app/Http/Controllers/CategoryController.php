<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Categoryhassubcategory;

class CategoryController extends Controller
{
    //
    function show(){
        //$cat = Category::find(7);
        //return Category::with('subCategory')->get();
        //$subcategoryList=Category::find(7)->subCategory;
        //return $subcategoryList[0];
        //return Subcategory::all()->cateGory;
        //$subcategoryList= $subcategoryList[0];
        //return $subcategoryList['subCategory'];

        
        //return Categoryhassubcategory::find();
        return view("dashboard.category")->with(['categories'=>Category::all()]);
    }
    public function insert(Request $request){
        if($request['update']=="0"){
            $categoryName = $request['name'];
            if($request->file('image')){
                $file= $request->file('image');
                $fileName= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('categoryimage'), $fileName);
                $data['image']= $fileName;

                $Category = new Category;
                $Category->name = $categoryName;
                $Category->image=$fileName;
                $Category->save();
            }
            return redirect('category');
        }
        else if($request['update']=="1"){
                //return "update";
                $catObj=Category::find($request['id']);
                $catObj->name=$request['name'];
                $catObj->save();
                return redirect('category');
        }


    }
    public function deleteCategory(Request $req){         Categoryhassubcategory::where('category_id', $req['id'])->delete();
        $categoryObj=Category::find($req['id']);
        $categoryObj->delete();
        return redirect ('category');
    }
}
