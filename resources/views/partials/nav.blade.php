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

    <div class="top_bar">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-row">
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('images/phone.png')}}" alt=""></div>{!! setting('site.telefono') !!}</div>
                    <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{asset('images/mail.png')}}" alt=""></div><a href="{{setting('site.correo')}}">{!! setting('site.correo') !!}</a></div>
                    <div class="top_bar_content ml-auto">

                        @if (! (request()->is('checkout') || request()->is('guestCheckout')))

                            @guest
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="images/user.svg" alt=""></div>
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
                <div class="col-lg-3 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        @if(setting('site.logo'))
                            <a href="{{route('landing-page')}}">
                                <img height="80px" width="255px" src="{{productImage(setting('site.logo'))  }}" alt="">
                            </a>
                        @else
                            <div class="logo">
                                <a href="{{route('landing-page')}}">{!! setting('site.title') !!}</a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form action="{{route('search')}}" class="header_search_form clearfix">
                                    <input type="text" name="query"  value="{{ request()->input('query') }}" class="header_search_input" placeholder="Buscar productos ...">
                                    <div class="custom_dropdown"  hidden>
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
                                <div class="wishlist_icon"><img src="{{asset('images/heart.png')}}" alt=""></div>
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
                                    <img src="{{asset('images/cart.png')}}" alt="">
                                    @if( Cart::instance('default')->count() > 0)
                                        <div class="cart_count"><span>{{ Cart::instance('default')->count() }}</span></div>
                                    @else
                                        <div class="cart_count"><span>0</span></div>
                                    @endif
                                </div>
                                <div class="cart_content">
                                    <div class="cart_text"><a href="{{route('cart.index')}}">Cesta</a></div>
                                    <div class="cart_price">S/{{Cart::total() }}</div>
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

                                        <li class=" {{ count($category->categories) >= 1 ? 'hassubs':''}}">
                                            <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}<i class="fas fa-chevron-right"></i></a>

                                            <ul>

                                                @foreach($category->categories as $item)

                                                    @if($item->order == 2)
                                                        <li class="{{ count($item->categories) >= 1 ? 'hassubs':''}}">
                                                            <a href="{{route('shop.index',['category'=>$category->slug])}}">{{$item->name}}<i class="fas fa-chevron-right"></i></a>
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
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/phone_white.png')}}" alt=""></div>{!! setting('site.telefono') !!}}</div>
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">{!! setting('site.correo') !!}</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
