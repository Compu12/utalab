

@extends('layouts.guest')
@section('titulo')
| Iniciar Sesión
@endsection
@section('content')

<div class="col-xl-12 col-lg-12 col-md-6 mt-5">
    <div class="card o-hidden border-0 shadow-lg mt-5">

        <div class="card-body">
            <div class="row">
                 <a class="col-lg-6 d-none d-lg-block bg-login-image border-right" href="{{ route('welcome') }}"></a>
                <div class="col-lg-6 ">
                      <div class="p-5">
                           <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">¡Bienvenido a <strong>UTA-LAB</strong>!</h1>
                        </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                                <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Correo electrónico" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                                <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password">
                                @error('contrasenia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-danger btn-user btn-block mb-3">
                                    {{ __('INICIAR SESIÓN') }}
                                </button>
                            </div>
                        </div>
                    </form>
                     <div class="text-center">
                      @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                                </div>
                                <hr>
                        <div class="text-center">
                            ¿Nuevo en UTA-LAB? <strong><a href="{{ route('register') }}">Crea una cuenta.</a></strong>
                        </div>
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection
