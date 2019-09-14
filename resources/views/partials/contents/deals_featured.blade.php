<!-- Deals of the week -->

<div class="deals_featured">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                <!-- Deals -->

                <div class="deals">
                    <div class="deals_title">Ofertas de la Semana</div>
                    <div class="deals_slider_container">

                        <!-- Deals Slider -->
                        <div class="owl-carousel owl-theme deals_slider">

                            @foreach($promotions_week as $promotion)
                                @if($promotion->count() > 0)
                                    <!-- Deals Item -->
                                        <div class="owl-item deals_item">
                                            <div class="deals_image">
                                                <a href="{{route('shop.show',$promotion->slug)}}" target="_blank"><img class="img-fluid" src="{{ asset('storage/'.$promotion->image) }}" alt=""></a>
                                            </div>
                                            <div class="deals_content">
                                                <div class="deals_info_line d-flex flex-row justify-content-start">
                                                    <div class="deals_item_name">{{$promotion->name}}</div>
                                                    <div class="deals_item_price ml-auto">S/{{$promotion->price}}</div>
                                                </div>
                                            </div>
                                        </div>
                                @else
                                    <div class="owl-item deals_item">
                                       <div><h5>No hay productos en promoción por esta semana</h5></div>
                                    </div>
                                @endif

                            @endforeach

                        </div>

                    </div>

                    <div class="deals_slider_nav_container">
                        <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                        <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                    </div>
                </div>

                <!-- Featured -->
                <div class="featured">
                    <div class="tabbed_container">
                        <div class="tabs">
                            <ul class="clearfix">
                                <li class="active">Promociones</li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>

                        <!-- Product Panel -->
                        <div class="product_panel panel active">
                            <div class="featured_slider slider">

                                @foreach($promotions as $promotion)
                                    <!-- Slider Item -->
                                    <div class="featured_slider_item">
                                        <div class="border_active"></div>
                                        <div class="product_item {{$promotion->status ? $promotion->status:''}} d-flex flex-column align-items-center justify-content-center text-center">
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('storage/'.$promotion->image) }}" alt="">
                                            </div>
                                            <div class="product_content">
                                                <div class="product_price discount">{{$promotion->presentPrice()}}</div>
                                                <div class="product_name"><div><a href="{{route('shop.show',$promotion->slug)}}" target="_blank">{{$promotion->name}}</a></div></div>
                                                <div class="product_extras">
                                                    <form action="{{route('shop.show',$promotion->slug)}}" method="get">
                                                        <button class="product_cart_button" type="submit">Ver producto</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="product_fav"><i class="fas fa-heart"></i></div>
                                            <ul class="product_marks">
                                                <li class="product_mark product_discount">-25%</li>
                                                <li class="product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="featured_slider_dots_cover"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
