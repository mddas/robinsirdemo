<!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <!----crousal 1------>
                            <div class="latest-prdouct__slider__item">
                                @foreach($products as $product)
                                <a href="/shoapdetail?id={{$product['id']}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/product/{{json_decode($product['image'])[0]}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>{{$product['price']}}</span>
                                    </div>
                                </a>
                                @if($loop->iteration==3)
                                    @break  
                                @endif    
                                @endforeach

                            </div>
                            <!-----crousal 1 end---->
                            <div class="latest-prdouct__slider__item">
                                <!----second crousal----->
                                @foreach($products as $product)
                                <a href="/shoapdetail?id={{$product['id']}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/product/{{json_decode($product['image'])[0]}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>Rs.{{$product['price']}}</span>
                                    </div>
                                </a>
                                @if($loop->iteration==3)
                                    @break  
                                @endif    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <!----second crousal----->
                                @foreach($products as $product)
                                <a href="/shoapdetail?id={{$product['id']}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/product/{{json_decode($product['image'])[0]}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>Rs.{{$product['price']}}</span>
                                    </div>
                                </a>
                                @if($loop->iteration==3)
                                    @break  
                                @endif    
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <!----second crousal----->
                                @foreach($products as $product)
                                <a href="/shoapdetail?id={{$product['id']}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/product/{{json_decode($product['image'])[0]}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>Rs.{{$product['price']}}</span>
                                    </div>
                                </a>
                                @if($loop->iteration==3)
                                    @break  
                                @endif    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <!----second crousal----->
                                @foreach($products as $product)
                                <a href="/shoapdetail?id={{$product['id']}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/product/{{json_decode($product['image'])[0]}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$product['name']}}</h6>
                                        <span>Rs.{{$product['price']}}</span>
                                    </div>
                                </a>
                                @if($loop->iteration==3)
                                    @break  
                                @endif    
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->