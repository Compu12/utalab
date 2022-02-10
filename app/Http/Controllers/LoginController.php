<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    protected function credentials(\Illuminate\Http\Request $request)
    {
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'estado' => 'Activo'];
    }

    protected function sendFailedLoginResponse(\Illuminate\Http\Request $request)
    {

        if ( !User::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => 'El usuario no es correcto',
                ]);
        }

        if ( !User::where('email', $request->email)->where('password', bcrypt($request->password))->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => 'Error de autentificación',
                ]);
        }


        if ( !User::where('email', $request->email)->where('password', bcrypt($request->password))->where('state', 1)->first() ) {
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => 'Su usuario actualmente se encuentra inactivo, contacte al administrador',
                ]);
        }

    }
}
