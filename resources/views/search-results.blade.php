@extends('layout')

@section('title', 'Productos')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/plantilla/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla/shop_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla/shop_responsive.css') }}">
@endsection

@section('content')

    <!-- Home -->

    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">{{$categoryName}}</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row justify-content-center">
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
            <div class="row">


                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categorias</div>
                            <ul class="sidebar_categories">
                                @foreach($categories as $category)
                                    @if($category->order == 1)
                                        <li class="{{setActiveCategory($category->slug)}}"><a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar_section filter_by_section">
                            <div class="sidebar_title">Filtrado por</div>
                            <div class="sidebar_subtitle">Precio</div>
                            <div class="filter_price">
                                <div id="slider-range" class="slider_range"></div>
                                <p>Entre: </p>
                                <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>{{ $products->count() }}</span> resultados para {{ request()->input('query') }}</div>
                            <div class="shop_sorting">
                                <span>Ordenar por:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">Mejor valorado<i class="fas fa-chevron-down"></i></span></i>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Mejor valorado</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Nombre</li>
                                            <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>Precio</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid">
                            <div class="product_grid_border"></div>

                        @forelse($products as $product)
                            <!-- Product Item -->
                                <div class="product_item {{$product->status ? $product->status:''}}">
                                    <div class="product_border"></div>
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                        <a href="{{route('shop.show',$product->slug)}}" target="_blank">
                                            <img src="{{ productImage($product->image) }}" alt="{{$product->name}}">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_price">{{$product->presentPrice()}}</div>
                                        <div class="product_name"><div><a href="{{route('shop.show',$product->slug)}}" tabindex="0" target="_blank">{{$product->name}}</a></div></div>
                                    </div>
                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount">-25%</li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            @empty
                                <div class="mt-5 pl-5">No se encontraron artículos</div>
                            @endforelse

                        </div>

                        <!-- Shop Page Navigation -->

                        {!! $products->appends(request()->input())->links('partials.pagination') !!}

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')

    <script src="{{ asset('js/plantilla/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/plantilla/parallax.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/shop_custom.js') }}"></script>
@endsection
