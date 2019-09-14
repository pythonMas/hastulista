@extends('layout')

@section('title', 'Gracias')

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/plantilla/main_styles.css')}}">
    <link rel="stylesheet" href="{{asset('css/plantilla/responsive.css')}}">
@endsection

@section('body-class', 'sticky-footer')

@section('content')

    <div class="container p-5 m-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1 class="text-center">Gracias por <br> Su pedido!</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <p class="text-center">Su pedido ha sido enviado</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="{{ url('/') }}" class="btn btn-lg btn-block btn-outline-primary">Página de inicio</a>
            </div>
        </div>
    </div>




@endsection
