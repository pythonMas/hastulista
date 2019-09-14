@extends('layout')

@section('title', 'Mis pedidos')

@section('extra-css')
<link rel="stylesheet" href="{{asset('css/plantilla/cart_styles.css')}}">
@endsection

@section('content')

    <div class="cart_section">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 offset-lg-1">
                    <h1 class="text-md-center ">Mis pedidos</h1>
                    @if (session()->has('success_message'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif


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

                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach($orders as $order)
                                    @foreach($order->products as $product)
                                        <li class="cart_item clearfix">
                                            <div class="cart_item_image">
                                                <img  src="{{ asset('storage/'.$product->image) }}" alt="{{$product->image}}">
                                            </div>
                                            <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                                <div class="cart_item_name cart_info_col">
                                                    <div class="cart_item_title">Producto</div>
                                                    <div class="cart_item_text">{{$product->name}}</div>
                                                </div>
                                                <div class="cart_item_quantity cart_info_col">
                                                    <div class="cart_item_title">Cantidad</div>
                                                    <div class="cart_item_text">{{$product->pivot->quantity}}</div>
                                                </div>
                                                <div class="cart_item_price cart_info_col">
                                                    <div class="cart_item_title">Precio</div>
                                                    <div class="cart_item_text">S/{{$product->price}}</div>
                                                </div>
                                                <div class="cart_item_buttons cart_info_col">
                                                    <div class="cart_item_title"></div>
                                                    <div class="cart_item_text row ">
                                                        <div><a href="{{ route('orders.show', $order->id) }}">Detalles del pedido</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')
@endsection
