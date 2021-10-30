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
                        <form class="user" action="{{ route('index') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user"
                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                    placeholder="Correo electrónico">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user"
                                    id="exampleInputPassword" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                    <label class="custom-control-label" for="customCheck">
                                        Recuérdame</label>
                                </div>
                            </div>
                            <button type="sub" class="btn btn-danger btn-user btn-block mb-3">
                                <strong>INICIAR SESIÓN</strong>
                            </button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('forgot-password') }}">¿Olvidaste tu contraseña?</a>
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
