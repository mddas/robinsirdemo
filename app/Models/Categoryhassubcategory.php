<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Categoryhassubcategory extends Model
{
    use HasFactory;

    public function getSubCategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
        //Categoryhassubcategory::->(Subcategory,"foreign key of Categoryhassubcategory" ,'where Subcategory id is default set')
    }
}
