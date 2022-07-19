<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Categoryhassubcategory;



class SubcategoryController extends Controller
{
    public function show()
    {
        //if(Subcategory::find(26)->cateGory==null){
          //      return "md you are null";
        //}
        //dd(Subcategory::find(2)->cateGory->category_id);
        //dd(Category::with('subCategory')->get());
        //return cateGorymd();
        //return Subcategory::cateGory;
      return view("dashboard.subcategory")->with(['subcategory'=>Subcategory::all(),'category'=>Category::all()]);
    }

    public function insert(Request $req){
        //dd($req);
        if($req['update']=='0'){
            $subCategoryName=$req['name'];
            $categoryID=$req['category'];        

       
            if($req->file('image')){
                $file= $req->file('image');
                $fileName= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('subcategoryimage'), $fileName);
                $data['image']= $fileName;
            }
            else{
                $fileName="null";
            }

            $Subcategory = new Subcategory;
            $Subcategory->name = $subCategoryName;
            $Subcategory->image=$fileName;
            $Subcategory->save();
            //insert category id and subcategory to the table Categoryhassubcategory.
            $categoryHasSub=new Categoryhassubcategory;
            $categoryHasSub->category_id=$categoryID;
            $categoryHasSub->subcategory_id=$Subcategory->id;
            $categoryHasSub->save();

            return redirect('subcategory');
        }
        else if($req['update']=='1'){
            try{
                $subcategoryObj=Subcategory::find($req['subcategory_id']); $subcategoryObj->name=$req['name'];
                    $subcategoryObj->save();
                    //dd($subcategoryObj);

            }
            catch(Exception $e){
                 dd($e->getMesage());
             }
              $categoryHasSub=Categoryhassubcategory::where('subcategory_id',$req['subcategory_id'])->first();
              //return $categoryHasSub; 
              $categoryHasSub->category_id = $req['category'];
              $categoryHasSub->save();
              //dd($categoryHasSub);
              return redirect('subcategory'); 
            }

    }

    public function deleteSubcategory(Request $req){
             $SubCategory = Subcategory::find($req['id']);
             $SubCategory->delete();
             //delete from categoryhassubcategories table
             $categoryhassubcategories = Categoryhassubcategory::where("subcategory_id",$req['id'])->first();
             $categoryhassubcategories->delete();
             return redirect('subcategory');
    }

    public function getsubcategory(Request $req){
        $id = $req['id'];
        $subCategory = Categoryhassubcategory::where("category_id",$id)->with("getSubCategory")->get();//->with("getSubCategory")->get();
        return $subCategory;
    }
}
