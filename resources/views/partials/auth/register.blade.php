<!-- Modal -->
<div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="RegisterModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="RegisterModalLabel" class="text-center">Registrate y comienza a pedir.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    {{--<form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-gorup row border">


                            <div class="col-md-6 mt-2">
                                <div class="form-group">

                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                </div>
                            </div>

                            <div class="col-md-6 mt-2 pl-2">
                                <select class="form-control" name="tipo_documento">
                                    <option value="0">Tipo de documento</option>
                                    <option value="DNI">DNI</option>
                                    <option value="RUC">RUC</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="numero_documento" class="form-control" placeholder="Numero de documento">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input  type="text" placeholder="Usuario" class="form-control @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario" >

                                    @error('usuario')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <input  type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>
                    </form>--}}

                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="input-group my-3">

                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class=" input-group-addon"><i class="fa fa-user "></i></span>
                                </div>
                            </div>


                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror py-4" name="name" value="{{ old('name') }}"
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


                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror py-4" name="email" value="{{ old('email') }}"
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
                                   required autocomplete="new-password" placeholder="Contraseña">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="input-group my-3">

                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class=" input-group-addon"><i class="fas fa-check-circle"></i></span>
                                </div>
                            </div>

                            <input id="password-confirm" type="password" class="form-control py-4" name="password_confirmation" required autocomplete="new-password"
                                   placeholder="Confirmar contraseña">
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-12 ">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">
                                    {{ __('Registrarme') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
