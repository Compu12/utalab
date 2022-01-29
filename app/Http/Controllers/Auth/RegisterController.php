<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'cedula' => ['required', 'string', 'max:10','unique:users'],
            'nombre' => ['required', 'string', 'max:50'],
            'apellido' => ['required', 'string', 'max:50'],
            'provincia' => ['required', 'string', 'max:100'],
            'canton' => ['required', 'string', 'max:100'],
            'direccion' => ['required', 'string', 'max:255'],
            'rol' => ['required', 'string', 'max:50'],
            'estado' => ['required', 'string', 'max:50'],
           /*  'laboratorio' => ['string','min:0', 'max:50'], */
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'cedula' => $data['cedula'],
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'provincia' => $data['provincia'],
            'canton' => $data['canton'],
            'direccion' => $data['direccion'],
            'rol' => $data['rol'],
            'estado' => $data['estado'],
            /* 'laboratorio' => $data['laboratorio'], */
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
