<!-- Recently Viewed -->

<div class="viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="viewed_title_container">
                    <h3 class="viewed_title">También podría gustarte</h3>
                    <div class="viewed_nav_container">
                        <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                        <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                    </div>
                </div>

                <div class="viewed_slider_container">

                    <!-- Recently Viewed Slider -->

                    <div class="owl-carousel owl-theme viewed_slider">

                        @foreach($mightAlsoLike as $product)
                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item  d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image">
                                        <a href="{{route('shop.show',$product->slug)}}" target="_blank">
                                            <img src="{{ productImage($product->image) }}" alt="{{$product->name}}">
                                        </a>
                                    </div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">{{$product->presentPrice()}}</div>
                                        <div class="viewed_name"><a href="{{route('shop.show',$product->slug)}}" target="_blank">{{$product->name}}</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
