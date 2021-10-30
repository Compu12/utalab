@extends('layouts.guest')
@section('titulo')
| Reestablecer Contraseña
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
                            <h1 class="h4 text-gray-900 mb-4">¿Olvidaste tu Contraseña?</h1>
                        </div>
                        <div class="mb-4 text-justify text-gray-600">
                            No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.
                        </div>
                        <!-- Mensajes de Error -->
                        <div class="mb-4" >
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
                        <!-- Formulario Reestablecer Contraseña -->
                        <form class="user" action="{{ route('index') }}">
                            @csrf
                            <!-- Input Correo Electrónico -->
                            <div class="form-group">
                                <input type="email" id="email" name="email"
                                    class="form-control form-control-user"
                                    :value="old('email')" placeholder="Correo Electrónico"
                                    required autofocus>
                            </div>
                            <!-- Button Reestablecer Contraseña -->
                            <button type="sub" class="btn btn-danger btn-user btn-block">
                                <strong>REESTABLECER CONTRASEÑA</strong>
                            </button>
                        </form>
                        <hr>
                        <!-- Link Crear una Cuenta -->
                        <div class="text-center">
                            <a href="{{ route('register') }}">¡Crear una Cuenta!</a>
                        </div>
                        <!-- Link Iniciar Sesión -->
                        <div class="text-center">
                            ¿Ya tienes una cuenta?<a href="{{ route('login') }}"><strong> Iniciar sesión.</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
