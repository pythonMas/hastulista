<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Lista Ecommerce | @yield('title', '')</title>

    <link href="/img/favicon.ico" rel="SHORTCUT ICON" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/plantilla/fontawesome-all.css')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plantilla.css') }}">
</head>
<body>
<div id="app">


    <!-- Modal -->
    <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="LoginModalLabel" class="text-center">¡Inicia sesión en tu cuenta!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="input-group my-3">

                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class=" input-group-addon"><i class="fa fa-user py-2"></i></span>
                                        </div>
                                    </div>

                                    <input type="email" class="form-control @error('email') is-invalid @enderror py-4"
                                           name="email" placeholder="Email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="input-group my-3">

                                    <div class="input-group-prepend ">
                                        <div class="input-group-text ">
                                            <span class=" input-group-addon "><i class="fa fa-lock py-2"></i></span>
                                        </div>
                                    </div>

                                    <input type="password" class="form-control  @error('password') is-invalid @enderror py-4" placeholder="Contraseña"
                                           name="password" required autocomplete="current-password" >

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-12 ">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            {{ __('Iniciar sesión') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="{{asset('js/app.js')}}"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('#LoginModal').modal('toggle')
    });
</script>
</body>
</html>
