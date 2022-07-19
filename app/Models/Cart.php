<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Shippingaddress;

class Cart extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function getProduct(){
        return $this->belongsTo(Product::class,'product_id');//in cart there is product_id ,cart belongs to product with foreign key product_id
    }

    public  function getShippingAddress(){
        //Shippingaddress::foreign('user_id');
        return $this->belongsTo(Shippingaddress::class,'user_id','user_id');
        //in carts there is user_id and in shippingaddress table there is also user id.this return two table relation data.
        //cart::->belongsTo(Shippingaddress,'foreign key of cart','with refrence local key of Shippingadress')
    }

protected $fillable = [
    'user_id',
    'product_id',
    'id',
    'quantity',
    'payment',
];
}
