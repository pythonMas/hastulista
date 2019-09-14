<!-- Popular Categories -->

<div class="popular_categories">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="popular_categories_content">
                    <div class="popular_categories_title">Categorías Populares</div>
                    <div class="popular_categories_slider_nav">
                        <div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
                        <div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
                    </div>
                </div>
            </div>

            <!-- Popular Categories Slider -->

            <div class="col-lg-9">
                <div class="popular_categories_slider_container">
                    <div class="owl-carousel owl-theme popular_categories_slider">

                        @foreach($categories as $category)
                            @if($category->order == 1)
                                <!-- Popular Categories Item -->
                                <div class="owl-item">
                                    <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                        <div class="popular_category_image">
                                            <a href="{{route('shop.index',['category'=>$category->slug])}}"><img src="{{ asset('storage/'.$category->image) }}" alt="{{$category->name}}"></a>
                                        </div>
                                        <div class="popular_category_text">
                                            <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
