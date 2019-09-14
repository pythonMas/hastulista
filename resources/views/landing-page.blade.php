<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HasTuLista</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/plantilla/fontawesome-all.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla/main_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla/responsive.css') }}">
</head>


<body>
<div id="app">
    <div class="super_container">



        <!--Header Scroll-->

        <div class="header-scroll">
            <div class="container-fluid">
                <!-- Header Main -->

                <div class="header_main">
                    <div class="container">
                        <div class="row">

                            <!-- Logo -->
                            <div class="col-lg-3 col-sm-3 col-3 order-1">
                                <div class="logo_container">
                                    @if(setting('site.logo'))
                                        <a href="{{route('landing-page')}}">
                                            <img height="80px" width="255px" src="{{productImage(setting('site.logo'))  }}" alt="">
                                        </a>
                                    @else
                                        <div class="logo"><a href="{{route('landing-page')}}">{!! setting('site.title') !!}</a></div>
                                    @endif
                                </div>
                            </div>

                            <!-- Search -->
                            <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                                <div class="header_search">
                                    <div class="header_search_content">
                                        <div class="header_search_form_container">

                                            <form action="{{route('search')}}" class="header_search_form clearfix">

                                                <input type="text" name="query" value="{{ request()->input('query') }}" class="header_search_input" placeholder="Buscar productos ...">
                                                <div class="custom_dropdown" hidden>
                                                    <div class="custom_dropdown_list">

                                                        <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                        <i class="fas fa-chevron-down"></i>
                                                        <ul class="custom_list clc">
                                                            <li><a class="clc" href="#">All Categories</a></li>
                                                            <li><a class="clc" href="#">Computers</a></li>
                                                            <li><a class="clc" href="#">Laptops</a></li>
                                                            <li><a class="clc" href="#">Cameras</a></li>
                                                            <li><a class="clc" href="#">Hardware</a></li>
                                                            <li><a class="clc" href="#">Smartphones</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('images/search.png')}}" alt=""></button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Wishlist -->
                            <div class="col-lg-3 col-9 order-lg-3 order-2 text-lg-left text-right">
                                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                                    @if (Cart::instance('saveForLater')->count() > 0)
                                        <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                            <div class="wishlist_icon"><img src="{{asset('images/heart.png')}}"  alt=""></div>
                                            <div class="wishlist_content">
                                                <div class="wishlist_text"><a href="{{route('cart.index')}}">Lista</a></div>
                                                <div class="wishlist_count">{{Cart::instance('saveForLater')->count()}}</div>
                                            </div>
                                        </div>
                                @endif

                                <!-- Cart -->
                                    <div class="cart">
                                        <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                            <div class="cart_icon">
                                                <img src="images/cart.png" alt="">
                                                @if( Cart::instance('default')->count() > 0)
                                                    <div class="cart_count"><span>{{ Cart::instance('default')->count() }}</span></div>
                                                @else
                                                    <div class="cart_count"><span>0</span></div>
                                                @endif
                                            </div>
                                            <div class="cart_content">
                                                <div class="cart_text"><a href="{{route('cart.index')}}">Cesta</a></div>
                                                <div class="cart_price"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">

                                <!-- Categories Menu -->

                                <div class="cat_menu_container">
                                    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_burger"><span></span><span></span><span></span></div>
                                        <div class="cat_menu_text">categorias</div>
                                    </div>

                                    <ul class="cat_menu">
                                        @foreach($categories as $category)
                                            @if($category->order==1)

                                                <li class=" {{ $category->categories->count() ? 'hassubs':''}}">
                                                    <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}<i class="fas fa-chevron-right"></i></a>

                                                    <ul>

                                                        @foreach($category->categories as $item)

                                                            @if($item->order == 2)
                                                                <li class="{{ $item->categories->count()? 'hassubs':''}}">
                                                                    <a href="{{route('shop.index',['category'=>$item->slug])}}">{{$item->name}}<i class="fas fa-chevron-right"></i></a>
                                                                    <ul>

                                                                        @foreach($item->categories as $value)

                                                                            @if($value->order == 3)
                                                                                <li><a href="{{route('shop.index',['category'=>$value->slug])}}">{{$value->name}}<i class="fas fa-chevron-right"></i></a></li>
                                                                            @endif

                                                                        @endforeach

                                                                    </ul>
                                                                </li>
                                                            @endif

                                                        @endforeach

                                                    </ul>
                                                </li>

                                            @endif


                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Main Nav Menu -->
                                <div class="main_nav_menu ml-auto">
                                    {{ menu('main', 'partials.menus.main') }}
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

        </div>

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->
            @if(session('message'))
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="alert alert-{{ session('message')[0] }}">
                            <h4 class="alert-heading">{{ __("Mensaje informativo") }}</h4>
                            <p>{{ session('message')[1] }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone.png" alt=""></div>{!! setting('site.telefono') !!}</div>
                            <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail.png" alt=""></div><a href="{{setting('site.mail')}}">{!! setting('site.correo') !!}</a></div>
                            <div class="top_bar_content ml-auto">
                                @if (! (request()->is('checkout') || request()->is('guestCheckout')))

                                    @guest
                                        <div class="top_bar_user">
                                            <div class="user_icon"><img src="{{ asset('images/user.svg') }}" alt=""></div>
                                            <div><a href="#" data-toggle="modal" data-target="#RegisterModal">Regístrate</a></div>
                                            <div><a href="#" data-toggle="modal" data-target="#LoginModal">Iniciar sesión</a></div>
                                        </div>
                                    @else
                                        <div class="top_bar_menu">
                                            <ul class="standard_dropdown top_bar_dropdown">
                                                <li>
                                                    <a href="#" id="navbarDropdown" >{{ Auth::user()->name }} <i class="fas fa-chevron-down"></i></a>
                                                    <ul>
                                                        <li><a href="{{ route('orders.index') }}">Mis pedidos</a></li>
                                                        <li><a href="{{ route('users.edit') }}">Editar</a></li>
                                                        <li>
                                                            <a href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                                {{ __('Cerrar sesión') }}
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>

                                                        </li>
                                                    </ul>

                                                </li>
                                            </ul>
                                        </div>
                                    @endguest
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-3 col-md-3 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                @if(setting('site.logo'))
                                    <a href="{{route('landing-page')}}">
                                        <img height="80px" width="255px" src="{{productImage(setting('site.logo'))  }}" alt="">
                                    </a>
                                @else
                                    <div class="logo"><a href="{{route('landing-page')}}">{!! setting('site.title') !!}</a></div>
                                @endif

                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-md-5 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class=" align-items-center justify-content-end">
                                <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">

                                        <form action="{{route('search')}}" class="header_search_form clearfix">

                                            <input type="text" name="query" value="{{ request()->input('query') }}" class="header_search_input" placeholder="Buscar productos ...">
                                            <div class="custom_dropdown" hidden>
                                                <div class="custom_dropdown_list" >
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{asset('images/search.png')}}" alt=""></button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-3 col-md-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                                @if (Cart::instance('saveForLater')->count() > 0)
                                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                        <div class="wishlist_icon"><img src="{{asset('images/heart.png')}}"  alt=""></div>
                                        <div class="wishlist_content">
                                            <div class="wishlist_text"><a href="{{route('cart.index')}}">Lista</a></div>
                                            <div class="wishlist_count">{{Cart::instance('saveForLater')->count()}}</div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="images/cart.png" alt="">
                                            @if( Cart::instance('default')->count() > 0)
                                                <div class="cart_count"><span>{{ Cart::instance('default')->count() }}</span></div>
                                            @else
                                                <div class="cart_count"><span>0</span></div>
                                            @endif
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{route('cart.index')}}">Cesta</a></div>
                                            <div class="cart_price"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Navigation -->

            <nav class="main_nav">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="main_nav_content d-flex flex-row">

                                <!-- Categories Menu -->

                                <div class="cat_menu_container">
                                    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                        <div class="cat_burger"><span></span><span></span><span></span></div>
                                        <div class="cat_menu_text">categorias</div>
                                    </div>

                                    <ul class="cat_menu">
                                        @foreach($categories as $category)
                                            @if($category->order==1)

                                                <li class=" {{ $category->categories->count() ? 'hassubs':''}}">
                                                    <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}<i class="fas fa-chevron-right"></i></a>

                                                    <ul>

                                                        @foreach($category->categories as $item)

                                                            @if($item->order == 2)
                                                                <li class="{{ $item->categories->count()? 'hassubs':''}}">
                                                                    <a href="{{route('shop.index',['category'=>$item->slug])}}">{{$item->name}}<i class="fas fa-chevron-right"></i></a>
                                                                    <ul>

                                                                        @foreach($item->categories as $value)

                                                                            @if($value->order == 3)
                                                                                <li><a href="{{route('shop.index',['category'=>$value->slug])}}">{{$value->name}}<i class="fas fa-chevron-right"></i></a></li>
                                                                            @endif

                                                                        @endforeach

                                                                    </ul>
                                                                </li>
                                                            @endif

                                                        @endforeach

                                                    </ul>
                                                </li>

                                            @endif


                                        @endforeach
                                    </ul>
                                </div>

                                <!-- Main Nav Menu -->
                                <div class="main_nav_menu ml-auto">
                                    {{ menu('main', 'partials.menus.main') }}
                                </div>

                                <!-- Menu Trigger -->

                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Menu -->

            <div class="page_menu">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div class="page_menu_content">

                                <div class="page_menu_search">
                                    <form action="{{route('search')}}">

                                        <input type="text" name="query" value="{{ request()->input('query') }}" class="page_menu_search_input" placeholder="Search for products...">
                                    </form>
                                </div>
                                <ul class="page_menu_nav">
                                    <li class="page_menu_item"><a href="{{route('landing-page')}}">Inicio<i class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item"><a href="{{route('shop.index')}}">Tienda<i class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item"><a href="{{route('cart.index')}}">Cesta<i class="fa fa-angle-down"></i></a></li>
                                </ul>

                                <div class="menu_contact">
                                    <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/phone_white.png')}}" alt=""></div>{!! setting('site.telefono') !!}</div>
                                    <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">{!! setting('site.correo') !!}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <!-- Banner -->

        <div class="banner_2">
            <div class="banner_2_background" style="background-image:url('{{asset('images/banner_2_background.jpg')}}')"></div>
            <div class="banner_2_container">
                <div class="banner_2_dots"></div>
                <!-- Banner 2 Slider -->

                <div class="owl-carousel owl-theme banner_2_slider">

                    @foreach($banners as $banner)
                        <!-- Banner 2 Slider Item -->
                        <div class="owl-item">
                            <div class="banner_2_item">
                                <div class="container fill_height">
                                    <div class="row fill_height">
                                        <div class="col-lg-4 col-md-6 fill_height">
                                            <div class="banner_2_content">
                                                <div class="banner_2_title">{{$banner->name}}</div>
                                                <div class="banner_2_text">{{$banner->description}}</div>
                                                <div class="product_price">{{$banner->presentPrice()}}</div>
                                                <div class="button banner_2_button">
                                                    <a href="{{route('shop.show',$banner->slug)}}">Explorar</a>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-8 col-md-6 fill_height">
                                            <div class="banner_2_image_container">
                                                <div class="banner_2_image">
                                                    <img src="{{ asset('storage/'.$banner->image) }}" alt="{{$banner->image}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div>


        @include('partials.contents.deals_featured')

        @include('partials.contents.popular_categories')

        <!-- Hot New Arrivals -->

        <div class="new_arrivals">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="tabbed_container">
                            <div class="tabs clearfix tabs-right">
                                <ul class="clearfix">
                                    <li class="new_arrivals_title active">Productos destacados</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12" style="z-index:1;">

                                    <!-- Product Panel -->
                                    <div class="product_panel panel active">
                                        <div class="arrivals_slider slider">

                                            @foreach($products as $product)
                                                <!-- Slider Item -->
                                                <div class="arrivals_slider_item ">
                                                        <div class="border_active"></div>
                                                        <div class=" product_item {{$product->status ? $product->status:''}} d-flex flex-column align-items-center justify-content-center text-center">
                                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                                <a href="{{route('shop.show',$product->slug)}}" target="_blank">
                                                                    {{--<img src="{{ asset('storage/'.$product->image) }}" alt="">--}}
                                                                    <img src="{{ productImage($product->image) }}" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="product_content">
                                                                <div class="product_price">{{$product->presentPrice()}}</div>
                                                                <div class="product_name"><div><a href="{{route('shop.show',$product->slug)}}" target="_blank">{{$product->name}}</a></div></div>
                                                                <div class="product_extras">
                                                                    <a href="{{route('cart.rapid.add',['id'=>$product->id])}}" class="btn btn-lg btn-block btn-primary">
                                                                        Añadir a carrito
                                                                    </a>
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
                                        <div class="arrivals_slider_dots_cover"></div>
                                    </div>

                                </div>

                            </div>
                            <div class="row justify-content-center">
                                <button class="button banner_button"><a href="{{route('shop.index')}}">Ver mas productos</a></button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @guest(session()->put('previousUrl', url()->current()))
            @include('partials.auth.login')
            @include('partials.auth.register')
        @endguest
        
        @include('partials.footer')

    </div>
</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/plantilla.js')}}"></script>
<script src="{{asset('js/plantilla/custom.js')}}" defer></script>
</body>
</html>
