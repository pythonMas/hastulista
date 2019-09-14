@extends('layout')

@section('title', 'Carrito')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/plantilla/cart_styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/plantilla/cart_responsive.css')}}">
@endsection

@section('content')
    <!-- Cart -->
    <div class="cart_section">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1">

                    @if (session()->has('success_message'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

                    @if( Cart::count() > 0)
                    <div class="cart_container">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h2>{{ Cart::count() }} artículo(s) en la cesta de compra</h2>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach(Cart::content() as $item)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image">
                                            <img src="{{ productImage($item->options->image) }}" alt="{{$item->name}}">
                                            {{--<img src="{{asset('storage/'.$item->options->image)}}" alt="">--}}
                                        </div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Producto</div>
                                                <div class="cart_item_text">{{$item->name}}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Cantidad</div>
                                                <div class="cart_item_text">{{$item->qty}}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Precio</div>
                                                <div class="cart_item_text">S/{{$item->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">S/{{$item->qty*$item->price}}</div>
                                            </div>
                                            <div class="cart_item_buttons cart_info_col">
                                                <div class="cart_item_title"></div>
                                                <div class="cart_item_text row ">
                                                    <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger mx-2">
                                                            <i class="fa fa-trash bigfonts" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="row d-flex  justify-content-end" >
                                    <div class="col-md-4">
                                        <div class="order_total_title">Subtotal:</div>
                                        <div class="order_total_amount">S/{{Cart::subtotal() }}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="order_total_title">Impuesto:</div>
                                        <div class="order_total_amount">S/{{Cart::tax() }}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="order_total_title">Total del pedido:</div>
                                        <div class="order_total_amount">S/{{Cart::total() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cart_buttons row justify-content-between px-3">
                            <form action="{{route('shop.index')}}" method="GET">
                                <button type="submit" class="button cart_button_clear ">Seguir comprando</button>
                            </form>
                            <form action="{{route('cart.switchToSaveForLater',$item->rowId)}}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="button  cart_button_later">Guardar para más adelante</button>
                            </form>

                            @if(auth()->check())
                                <form action="{{ route('checkout.index') }}" method="GET">
                                    <button type="submit" class="button cart_button_checkout ">Enviar pedido</button>
                                </form>
                            @else
                                <a href="#" class="button cart_button_clear " data-toggle="modal" data-target="#LoginModal">Iniciar sesión para ordenar</a>

                            @endif

                        </div>
                    </div>
                    @else
                        <div class="alert alert-dark" role="alert">
                            <h3 class="text-center"> No hay artículos en el carrito!</h3>
                        </div>
                        <div class="cart_buttons row justify-content-center">
                            <form action="{{route('shop.index')}}" method="get">
                                <button type="submit" class="button cart_button_clear ">Seguir comprando</button>
                            </form>
                        </div>
                    @endif

                    <hr>

                    @if (Cart::instance('saveForLater')->count() > 0)

                        <h2 class="text-center mt-4">{{ Cart::instance('saveForLater')->count() }} artículo(s) guardado para más tarde</h2>

                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach(Cart::instance('saveForLater')->content() as $item)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image">
                                            <img src="{{ productImage($item->options->image) }}" alt="{{$item->name}}">
                                            {{--<img src="{{ asset('storage/'.$item->options->image) }}" alt="">--}}

                                        </div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Producto</div>
                                                <div class="cart_item_text">{{$item->name}}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Cantidad</div>
                                                <div class="cart_item_text">{{$item->qty}}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Precio</div>
                                                <div class="cart_item_text">S/{{$item->price}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">S/{{$item->qty*$item->price}}</div>
                                            </div>
                                            <div class="cart_item_buttons cart_info_col">
                                                <div class="cart_item_title"></div>
                                                <div class="cart_item_text row">
                                                    <form action="{{route('saveForLater.switchToCart',$item->rowId)}}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-info mx-2">
                                                            <i class="fas fa-cart-plus bigfonts" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                    <form action="{{route('saveForLater.destroy',$item->rowId)}}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger mx-2">
                                                            <i class="fa fa-trash bigfonts" aria-hidden="true"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="row d-flex  justify-content-end" >
                                    <div class="col-md-3">
                                        <div class="order_total_title">Subtotal:</div>
                                        <div class="order_total_amount">S/{{Cart::subtotal() }}</div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="order_total_title">Impuesto:</div>
                                        <div class="order_total_amount">S/{{Cart::tax() }}</div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="order_total_title">Total del pedido:</div>
                                        <div class="order_total_amount">S/{{Cart::total() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @else
                        <div class="alert alert-dark" role="alert">
                            <h3 class="text-center"> No tiene artículos guardados para más tarde.</h3>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
    <script src="{{asset('js/plantilla/cart_custom.js')}}" defer></script>
@endsection
