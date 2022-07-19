@extends('layouts.masterhome')


@section('checkout')
@include('home.Breadcrumb-section')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="height:20px">
                    <h6 style="padding:1px 0 12px !important; margin-top: -25px;"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                    @if(Illuminate\Support\Facades\Session::has('message'))
<h3 class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Illuminate\Support\Facades\Session::get('message') }}</h3>
@endif

                </div>
                    @if ($errors->any())
    <div class="left alert alert-danger" style="margin-left: 20px">
        <ul>
            @foreach ($errors->all() as $error)
                <li style='float: left ; margin-left:25px'>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
     @if(App\Http\Controllers\CartController::getTotalproductInCart()>0)
            <div class="checkout__form">
                <!----grid open----->
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <h4>Billing Details</h4>
                    </div>
                    <div class="col">
                        @if($shippingaddress)
                      <!----this is already added address----->
                 <div class="card" style="width: 28rem;">
                      <div class="card-body">
                        <form id="paymentform" action="https://uat.esewa.com.np/epay/main" method="POST">
                            @csrf
                        <div class="row">
                            <div class="col-2">
                                 <i class="fa fa-trash fa-2x"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="card-title list-group-item-info"><center>Shipping address</center></h5>
                            </div>
                        </div>
                       
                        
                        <ul class="list-group">
                          <li class="list-group-item">Name:{{$shippingaddress['name']}}</li>
                          <li class="list-group-item">shipping address:{{$shippingaddress['city_town_village']}}</li>
                          <li class="list-group-item">Mobile Number:{{$shippingaddress['number']}}</li>
                          <li class="list-group-item"><div class="row"><div class="col-sm"><label>COD:</label><input type="radio" name="payment_type" value="COD" checked onchange="PaymentFormActionChange(this.value)"></div><div class="col-sm"><label>E-SEWA:</label><input type="radio" name="payment_type" value="E-SEWA" onchange="PaymentFormActionChange(this.value)"></div></div></li>
                        </ul>
                        <center>
                         <input type="hidden" name="action" value="update">
                         

                         <!----E-sewa payment---->

                        <form >
                        <input value="{{App\Http\Controllers\CartController::getTotalPriceOfUser()+10}}" name="tAmt" type="hidden">
                        <input value="{{App\Http\Controllers\CartController::getTotalPriceOfUser()}}" name="amt" type="hidden">
                        <input value="5" name="txAmt" type="hidden">
                        <input value="2" name="psc" type="hidden">
                        <input value="3" name="pdc" type="hidden">
                        <input value="EPAYTEST" name="scd" type="hidden">
                        <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                        <input value="http://127.0.0.1:8000/esewa_payment_success?q=su" type="hidden" name="su">
                        <input value="http://127.0.0.1:8000/esewa_payment_failed?q=fu" type="hidden" name="fu">
                        <input class="btn btn-primary" value="Submit" type="submit">
                       

                         <!---E-sewa payment----->
                        </center>
                       </form>
                      </div>
                    </div>
                     
                      @endif
                <!--already added address is closed---->  
                    </div>
                    <div class="col">
                      <!---column third---->
                    </div>
                  </div>
                </div>
                <!----grid closed---->
                
                     
                <!----form open------>
                <form action="/billingaddress" method="get">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="name">
                                    </div>
                                </div>
                            </div>                            
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town_city">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" name="state">
                            </div>
                            <div class="checkout__input">
                                <p>Google Location<span>*</span></p>
                                <input type="text" name=location>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="mobile_number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>
                            
                         
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach($carts as $cart)
                                    <li>{{$cart->product->name}}<span>{{$cart->product->price}}</span></li>
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Shipping Fee <span>Rs.0</span></div>
                                <div class="checkout__order__total">Total <span>Rs.{{App\Http\Controllers\CartController::getTotalPriceOfUser()}}</span></div>
                    
                                <div class="checkout__input__checkbox">
                                    <div class="checkout__input__checkbox">
                                    <input type="radio" name="payment_type" value="COD">
                                    <label>COD</label>
                                    <input type="radio" name="payment_type" value="E-SEWA" style="margin-left:20px">
                                    <label>E-SEWA</label>                                   
                                </div>
                                </div>
                                
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!------form closed---->

            </div>
            @elseif(App\Http\Controllers\OrderController::isOrder()>0)
            <center><h3>Your {{App\Http\Controllers\OrderController::isOrder()}} Order on the Way</h3></center>
            @else
            <center><h3>Your Cart is now empty or you have not bought some order.Please visit and buy some product.</h3></center>
            @endif
        </div>
    </section>
    <!-- Checkout Section End -->
    @endsection