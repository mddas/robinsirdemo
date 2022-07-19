 @extends('layouts.masterhome')
 <!-- Shoping Cart Section Begin -->
 @section('shoping-cart')
    <section class="shoping-cart spad">
        @if(App\Http\Controllers\CartController::getTotalproductInCart()>0)
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Illuminate\Support\Facades\Auth::check()==1)
                                @php
                                    $Totaldiscount = 0;
                                @endphp
                                @foreach($carts as $cart)
                                @php
                                    $Totaldiscount = $Totaldiscount + $cart->product->discount*$cart->quantity;
                                @endphp
                                <tr id="{{$cart->id}}">
                                    <td class="shoping__cart__item">
                                        <!--json_decode($data['image'])--->
                                        <img src="product/{{json_decode($cart->product->image)[0]}}" alt="" width="150px" height="150px">
                                        <h5>{{$cart->product->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rs.{{$cart->product->price}}
                                    </td>
                                    <td>Rs.{{$cart->product->discount}}</td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$cart->quantity}}" disabled>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        Rs.{{$cart->product->price*$cart->quantity}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" onclick='deLete({{$cart->id}},"/cartdelete")'></span>
                                    </td>
                                </tr>
                                @endforeach
                                @endif

                                @if(empty($carts)==false && Illuminate\Support\Facades\Auth::check()==0)
                    
                                @foreach($carts as $key=>$cart)
                                <tr id="{{$key}}">
                                    <td class="shoping__cart__item">
                                        <img src="product/{{json_decode($cart['image'])[0]}}" alt="" width="150px" height="150px">
                                        <h5>{{$cart['name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        Rs.{{$cart['price']}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$cart['quantity']}}" disabled>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        Rs.{{$cart['price']}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" onclick='deLete({{$key}},"/cartdelete")'></span>
                                    </td>
                                </tr>
                                @endforeach
                                
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Shipping Fee <span>Rs.0</span></li>
                            @if(Illuminate\Support\Facades\Auth::check()==1)
                            <li>Total Discount  <span>{{$Totaldiscount}}</span></li>
                            @endif
                            <li>Total <span>Rs.{{App\Http\Controllers\CartController::getTotalPriceOfUser()}}</span></li>
                        </ul>
                        <a href="/checkout" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <center><h2>There is no any product in cart . Please buy some product</h2></center>
        @endif
    </section>
    
    <!-- Shoping Cart Section End -->

@endsection