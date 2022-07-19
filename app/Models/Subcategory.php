<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;

class Subcategory extends Model
{
    use HasFactory;
    // protected $fillable = ['name','updated_at'];

    public function cateGory()
    {
        $cate = $this->hasOne(Categoryhassubcategory::class);
        return $cate;
    }
    public static function getCateGoryName(int $categoryid)
    {
        try{
            $cat=Category::where('id',$categoryid)->count();
            if($cat > 0){
                $cat = Category::where('id',$categoryid)->first();
                return $cat['name'];
            }else{
                return 'Empty';
            }
        }
        catch(Exception $e){
            dd($e->getMesage());    
            return "null";
        }


    }
}
