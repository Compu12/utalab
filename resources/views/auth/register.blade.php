@extends('layouts.guest')
@section('titulo')
    | Registro
@endsection
@section('content')
    <div class="col-xl-12 col-lg-12 col-md-6 mt-5">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body">
                <div class="row">
                    <a class="col-lg-6 d-none d-lg-block bg-login-image border-right" href="{{ route('welcome') }}"></a>
                    <div class="col-lg-6 ">
                        <div class="p-2">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crear una cuenta!</h1>
                            </div>
                            <div class="mb-4">
                                @if ($errors->any())
                                    <div>
                                        <div class="font-medium text-danger">{{ __('¡Ups! Algo salió mal.') }}</div>
                                        <ul class="mt-3 list-disc list-inside text-sm text-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">


                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="cedula" type="text"
                                            class="form-control form-control-user @error('cedula') is-invalid @enderror"
                                            placeholder="Cédula" name="cedula" value="{{ old('cedula') }}" required
                                            autocomplete="cedula" autofocus>

                                        @error('cedula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="nombre" type="text"
                                            class="form-control form-control-user @error('nombre') is-invalid @enderror"
                                            placeholder="Nombre" name="nombre" value="{{ old('nombre') }}" required
                                            autocomplete="nombre" autofocus>

                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="apellido" type="text"
                                            class="form-control form-control-user @error('apellido') is-invalid @enderror"
                                            placeholder="Apellido" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido"
                                            autofocus>

                                        @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>





                                <div class="form-group row">


                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="provincia" type="text"
                                            class="form-control form-control-user @error('provincia') is-invalid @enderror"
                                            placeholder="Provincia" name="provincia" value="{{ old('provincia') }}"
                                            required autocomplete="provincia" autofocus>

                                        @error('provincia')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="canton" type="text"
                                            class="form-control form-control-user @error('canton') is-invalid @enderror"
                                          placeholder="Cantón"  name="canton" value="{{ old('canton') }}" required autocomplete="canton"
                                            autofocus>

                                        @error('canton')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>





                                <div class="form-group">

                                    <input id="direccion" type="text"
                                        class="form-control form-control-user @error('direccion') is-invalid @enderror"
                                        placeholder="Dirección"name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion"
                                        autofocus>

                                    @error('direccion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       placeholder="Correo" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            placeholder="Contraseña" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control form-control-user"
                                            placeholder="Confirmar Contraseña" password_confirmation required
                                            autocomplete="new-password">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <input id="rol" name="rol" type="hidden" class="form-control form-control-user" value="cliente">
                                </div>
                                <div class="col-md-6">
                                    <input id="estado" name="estado" type="hidden" class="form-control form-control-user" value="Activo">
                                </div>
                                <div class="col-md-6">
                                    <input id="laboratorio" name="laboratorio" type="hidden" class="form-control form-control-user" value="">
                                </div>







                                <button type="submit" class="btn btn-danger btn-user btn-block">
                                    {{ __('REGISTRAR CUENTA') }}
                                </button>


                            </form>
                            <hr>
                            <!-- Link ¿Olvidaste tu contraseña? -->
                            <div class="text-center">
                                <a href="{{ route('forgot-password') }}">¿Olvidaste tu contraseña?</a>
                            </div>
                            <!-- Link Iniciar Sesión -->
                            <div class="text-center">
                                ¿Ya tienes una cuenta?<a href="{{ route('login') }}"><strong> Iniciar
                                        sesión.</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
