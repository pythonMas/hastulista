@extends('layout')

@section('title', 'Mi perfil')

@section('extra-css')
{{--    <link rel="stylesheet" href="{{ asset('css/plantilla/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla/shop_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla/shop_responsive.css') }}">--}}

<link rel="stylesheet" href="{{ asset('css/plantilla/main_styles.css') }}">
@endsection

@section('content')

    <div class="container">

        <div class=" row justify-content-around">

            <div class="col-md-6 offset-md-3 col-sm-12 ">
                <h1 class="text-md-center ">Mi perfil</h1>
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
                <form method="POST" action="{{ route('users.update') }}">
                    @method('patch')
                    @csrf

                    <div class="input-group my-3">

                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class=" input-group-addon"><i class="fa fa-user "></i></span>
                            </div>
                        </div>


                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror py-4" name="name" value="{{ old('name', $user->name) }}"
                               required autocomplete="name" autofocus placeholder="Nombre completo">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="input-group my-3">

                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class=" input-group-addon"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror py-4" name="email" value="{{ old('email', $user->email) }}"
                               required autocomplete="email" placeholder="Dirección de correo electrónico">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="input-group my-3">

                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class=" input-group-addon"><i class="fas fa-lock"></i></span>
                            </div>
                        </div>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror py-4" name="password"
                               autocomplete="new-password" placeholder="Contraseña">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div>Deje la contraseña en blanco para mantener la contraseña actual</div>

                    <div class="input-group my-3">

                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class=" input-group-addon"><i class="fas fa-check-circle"></i></span>
                            </div>
                        </div>

                        <input id="password-confirm" type="password" class="form-control py-4" name="password_confirmation" autocomplete="new-password"
                               placeholder="Confirmar contraseña">
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary btn-block btn-lg">
                                {{ __('Actualizar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@section('extra-js')
{{--
    <script src="{{ asset('js/plantilla/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/plantilla/parallax.min.js') }}"></script>
    <script src="{{ asset('js/plantilla/shop_custom.js') }}"></script>--}}
@endsection
