<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippingaddress extends Model
{
    //Shippingaddress::foreign('user_id');

    use HasFactory;
    protected $fillable = [
    'number',
    'user_id',
    'email',
    'city_town_village',
    'state',
    'googleLocation',
    'name',
    'payment_type',
   ];
}
