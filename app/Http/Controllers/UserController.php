<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
   public function index()
    {

        $users=User::where('rol', '!=', 'cliente')->get();
        return view("laboratoristas.index", ["labs" => $users]);

    }

    public function store(Request $request)
    {
        $newUser = new User();
        $newUser->cedula = $request->cedula;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;
        $newUser->provincia = $request->provincia;
        $newUser->canton = $request->canton;
        $newUser->direccion = $request->direccion;
        $newUser->rol = $request->rol;
        $newUser->estado = $request->estado;
        $newUser->laboratorio = $request->laboratorio;
        $newUser->email = $request->email;
        $newUser-> password =  Hash::make($request->password);
        $newUser->save();
       return redirect()->back();
    }

      public function update(Request $request, $userId)
    {
        /* User::find($userId); */
        $newUser = User::find($userId);
        $newUser->cedula = $request->cedula;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;
        $newUser->provincia = $request->provincia;
        $newUser->canton = $request->canton;
        $newUser->direccion = $request->direccion;
        $newUser->rol = $request->rol;
        $newUser->estado = $request->estado;
        $newUser->laboratorio = $request->laboratorio;
        $newUser->email = $request->email;
        $newUser->save();
       return redirect()->back();
    }

    public function create(array $data)
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
            'laboratorio' => $data['laboratorio'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
     public function delete($userId)
    {
        $newUser = User::find($userId);
        $newUser->delete();
        return redirect()->back();
    }


/* CLIENTE */

    public function indexCliente()
    {

        $clients=User::where('rol', '=', 'Cliente')->get();
        return view("clientes.index", ["cli" => $clients]);


    }

    public function updateCliente(Request $request, $userId)
    {
        /* User::find($userId); */
        $newUser = User::find($userId);
        $newUser->cedula = $request->cedula;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;
        $newUser->provincia = $request->provincia;
        $newUser->canton = $request->canton;
        $newUser->direccion = $request->direccion;
        $newUser->estado = $request->estado;
        $newUser->email = $request->email;
        $newUser->save();
       return redirect()->back();
    }

    public function storeCliente(Request $request)
    {
        $newUser = new User();
        $newUser->cedula = $request->cedula;
        $newUser->nombre = $request->nombre;
        $newUser->apellido = $request->apellido;
        $newUser->provincia = $request->provincia;
        $newUser->canton = $request->canton;
        $newUser->direccion = $request->direccion;
        $newUser->estado = $request->estado;
        $newUser->email = $request->email;
        $newUser->rol = "Cliente";
        $newUser-> password =  Hash::make($request->password);
        $newUser->save();
       return redirect()->back();
    }

    public function deleteCliente($userId)
    {
        $newUser = User::find($userId);
        $newUser->delete();
        return redirect()->back();
    }

}
