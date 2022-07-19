<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shippingaddress;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
    'payment_type',
    'order_id',
    'cancel',
    'user_id',
    'products',
    'payment_type',
];

    public  function getShippingAddress(){
        //Shippingaddress::foreign('user_id');
        return $this->belongsTo(Shippingaddress::class,'user_id','user_id');
        //in carts there is user_id and in shippingaddress table there is also user id.this return two table relation data.
        //cart::->belongsTo(Shippingaddress,'foreign key of cart','with refrence local key of Shippingadress')
    }
}
