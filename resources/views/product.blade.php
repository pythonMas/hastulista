@extends('layout')

@section('title', $product->name )

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/plantilla/product_styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/plantilla/product_responsive.css')}}">
@endsection

@section('content')

    <!-- Single Product -->

    <div class="single_product">
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
                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">

                    @if ($product->images)
                        <ul class="image_list">
                        @foreach (json_decode($product->images, true) as $image)

                            <li data-image="{{ productImage($image) }}"><img src="{{productImage($image)}}" alt=""></li>

                        @endforeach
                        </ul>
                    @endif

                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="image_selected img-fluid"><img class="img-fluid" src="{{ productImage($product->image) }}" alt=""></div>
                </div>

                <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="product_description">
                        <div class="product_name">{{$product->name}}</div>
                        <div class="product_text"><p>{{$product->description}}</p></div>
                        <div>{!! $stockLevel !!}</div>
                        <div class="order_info d-flex flex-row">
                            <form action="{{ route('cart.store') }}" method="POST">{{ csrf_field() }}
                                <div class="clearfix" style="z-index: 1000;">

                                    <!-- Product Quantity -->
                                    <div class="product_quantity clearfix">
                                        <span>Cantidad: </span>
                                        <input id="quantity_input" name="qty" type="text" pattern="[0-9]*" value="1" required  data-productQuantity="{{ $product->quantity }}">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="product_price">{{$product->presentPrice()}}</div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->name}}">
                                <input type="hidden" name="price" value="{{$product->price}}">
                                <input type="hidden" name="slug" value="{{$product->slug}}">
                                <input type="hidden" name="image" value="{{$product->image}}">

                                @if($product->quantity > 0)
                                    <div class="button_container">
                                        <button type="submit" class="btn btn-primary">Añadir a la cesta</button>
                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                    </div>
                                @else
                                    <div class="button_container">
                                        <h4>No está disponible</h4>
                                    </div>
                                @endif


                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('partials.might-like')

@endsection

@section('extra-js')
    <script src="{{asset('js/plantilla/product_custom.js')}}" defer></script>

@endsection
