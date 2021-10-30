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
                        <!-- Formulario de Registro -->
                        <form class="user" action="{{ route('index') }}">
                            @csrf
                            <div class="form-group row">
                                <!-- Input Nombre -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-user"
                                        placeholder="Cédula" :value="old('name')"
                                        required autofocus autocomplete="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- Input Nombre -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-user"
                                        placeholder="Nombre" :value="old('name')"
                                        required autofocus autocomplete="name">
                                </div>
                                <!--Input Apellido -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" id="apellido" name="apellido"
                                        class="form-control form-control-user"
                                        placeholder="Apellido" :value="old('apellido')"
                                        required autocomplete="apellido">
                                </div>
                            </div>
                            <div class="form-group row">
                                <!-- Input Nombre -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" id="name" name="name"
                                        class="form-control form-control-user"
                                        placeholder="Provincia" :value="old('name')"
                                        required autofocus autocomplete="name">
                                </div>
                                <!--Input Apellido -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" id="apellido" name="apellido"
                                        class="form-control form-control-user"
                                        placeholder="Cantón" :value="old('apellido')"
                                        required autocomplete="apellido">
                                </div>
                            </div>
                            <!-- Input Correo Electrónico -->
                            <div class="form-group">
                                <input type="text" id="email" name="email"
                                    class="form-control form-control-user"
                                    placeholder="Dirección" :value="old('email')"
                                    required autocomplete="email">
                            </div>
                            <!-- Input Correo Electrónico -->
                            <div class="form-group">
                                <input type="email" id="email" name="email"
                                    class="form-control form-control-user"
                                    placeholder="Correo Electrónico" :value="old('email')"
                                    required autocomplete="email">
                            </div>
                            <div class="form-group row">
                                <!-- Input Contraseña -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-user"
                                        placeholder="Contraseña"
                                        required autocomplete="new-password" >
                                </div>
                                <!-- Input Reestablecer Contraseña -->
                                <div class="col-sm-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control form-control-user"
                                        placeholder="Confirmar Contraseña"
                                        required autocomplete="new-password" >
                                </div>
                            </div>
                            <!-- Button Registrar Cuenta -->
                            <button type="sub" class="btn btn-danger btn-user btn-block">
                                <strong>REGISTRAR CUENTA</strong>
                            </button>
                        </form>
                        <hr>
                        <!-- Link ¿Olvidaste tu contraseña? -->
                        <div class="text-center">
                            <a href="{{ route('forgot-password') }}">¿Olvidaste tu contraseña?</a>
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
