
<!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($categories as $category)
                    <!---category--->
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/categoryimage/{{$category['image']}}">
                            <h5><a href="/searchproduct?name={{$category['name']}}#bottom_product">{{$category['name']}}</a></h5>
                        </div>
                    </div>
                    <!----end category----->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
