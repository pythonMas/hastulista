<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="LoginModalLabel" class="text-center">¡Inicia sesión en tu cuenta!</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h4 class="text-center">Acceder</h4>

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
                    @include('partials.auth.social_acount')
                </div>

                <div class="row my-3">
                    <div class="col-md-12 py-1">
                        <a href="{{ route('guestCheckout.index') }}" class="text-center"> <strong> Continua como invitado</strong> </a>
                    </div>

                    <div class="col-md-12 py-1">
                        <a  href="#" data-toggle="modal" data-target="#RegisterModal"  data-dismiss="modal"> <strong>Crear una cuenta</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


