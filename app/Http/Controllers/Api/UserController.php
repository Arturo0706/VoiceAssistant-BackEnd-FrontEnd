<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'first_last_name' => 'required|string',
            'second_last_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed',
            'rol_id' => 'integer|required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->first_last_name = $request->first_last_name;
        $user->second_last_name = $request->second_last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol_id = $request->rol_id;

        $user->save();

        return response()->json([
            "status" => 1,
            "msg" => "¡Alta de usuario con éxito!"
        ]);
    }
    public function login(Request $request)
    {
        $request->validate([
            "email" => 'required|email',
            "password" => 'required'
        ]);

        $user = User::where("email", "=", $request->email)->first();
        if (isset($user->id)) {
            if (Hash::check($request->password, $user->password)) {
                //We're gonna create a token and the answer

                $token = $user->createToken("auth_token")->plainTextToken;
                //If all the parametres are correct we're gonna return an answer OK!
                return response()->json([
                    "status" => 1,
                    "msg" => "¡Usuario logeado exitosamente. Bienvenido!",
                    "access_token" => $token
                ], 200);
            } else {
                //If the email and the password are incorrect we can't create the token
                return response()->json([
                    "status" => 0,
                    "msg" => "¡Hubo un error. Favor de verificar los parámetros!"
                ], 404);
            }
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "¡El usuario ingresado no ha sido registrado!"
            ], 404);
        }
    }
    public function userProfile()
    {
        return response()->json([
            "status" => 0,
            "msg" => "Acerca del perfil del usuario",
            "data" => auth()->user(),
        ]);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();


        return response()->json([
            "status" => 1,
            "msg" => "¡Sesión cerrada con éxito!",
        ]);
    }


    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }

    public function show($id)
    {
        $users = User::findOrfail($id);
        return response()->json($users, 200);
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($request->id);
        $users->name = $request->name;
        $users->first_last_name = $request->first_last_name;
        $users->second_last_name = $request->second_last_name;
        $users->email = $request->email;
        // $users->email_verified_at = $request->email_verified_at;
        $users->password = Hash::make($request->password);
        // $users->c_password = $request->c_password;
        $users->rol_id = $request->rol_id;
        return response()->json($users->save(), 200);
        // $users->save();
        // return $users;

    }

    public function delete(Request $request, $id)
    {
        $users = User::destroy($request->id);
        return response()->json($users, 200);
    }
}
