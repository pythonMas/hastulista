@extends('layout')

@section('title', 'Revisa')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/plantilla/main_styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/plantilla/responsive.css')}}">
@endsection

@section('content')


    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-between">
            <div class="col-md-5">
                <div>
                    <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <h3>Detalles de facturación</h3>

                        <div class="form-group">
                            <label for="email">Dirección de correo electrónico</label>

                            @if (auth()->user())
                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                            @else
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Ciudad</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="province">Provincia</label>
                                    <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                                </div>
                            </div>

                        </div> <!-- end half-form -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postalcode">Código postal</label>
                                    <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                                </div>
                            </div>

                        </div> <!-- end half-form -->

                        <input type="hidden" class="form-control"  name="newSubtotal" value="{{ Cart::subtotal() }}" >
                        <input type="hidden" class="form-control"  name="newTax" value="{{ Cart::tax() }}" >
                        <input type="hidden" class="form-control"  name="newTotal" value="{{ Cart::total() }}" >

                        <button type="submit" id="complete-order" class="btn btn-lg btn-block btn-outline-primary">Orden completa</button>

                    </form>


                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-table-container">
                    <h3>Su pedido</h3>

                    @foreach (Cart::content() as $item)
                        <div class="row justify-content-between">
                            <div class="col-md-3">
                                <img src="{{asset('storage/'.$item->options->image)}}" alt="item" class="img-fluid" width="133" height="133">
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <h5><strong>Producto:</strong> <span>{{$item->name}}</span></h5>
                                    <h5><strong>Descripción:</strong> <span>{{$item->options->slug}}</span></h5>
                                    <h5><strong>Precio:</strong> <span>S/{{$item->price}}</span></h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <strong class="mt-5">Cantidad</strong>
                                <span class="rounded p-4">{{$item->qty}}</span>
                            </div>
                        </div>
                    @endforeach
                    <hr>


                    <div class="row justify-content-between mx-5">
                        <h5><strong>Subtotal:</strong></h5> <h5><span>S/{{Cart::subtotal()}}</span></h5>
                    </div>
                    <div class="row justify-content-between mx-5">
                        <h5><strong>Impuesto:</strong></h5> <h5><span>S/{{Cart::tax()}}</span></h5>
                    </div>
                    <div class="row justify-content-between mx-5">
                        <h5><strong>Total:</strong></h5> <h5><span>S/{{Cart::total() }}</span></h5>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('extra-js')

@endsection
