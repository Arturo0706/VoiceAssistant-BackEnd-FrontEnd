<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'first_last_name' => 'required|string',
            'second_last_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
            // 'rol_id' => 'integer|required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->first_last_name = $request->first_last_name;
        $user->second_last_name = $request->second_last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol_id = User::CLIENTE;

        $user->save();
        $token = $user->createToken("auth_token")->plainTextToken;

        return $this->successResponse(["data" => $user, "token" => $token]);
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

                return $this->successResponse([
                    "Access_token" => $token,
                    "Mensaje" => "¡Usuario logeado exitosamente. Bienvenido!",
                ]);
            } else {

                //If the email and the password are incorrect we can't create the token

                return $this->errorResponse([
                    "Mensaje" => "¡Hubo un error. Favor de verificar los parámetros!",
                ]);
            }
        } else {
            return $this->errorResponse([
                "mensaje" => "¡El usuario ingresado no ha sido registrado!",
            ]);
        }
    }
    public function userProfile()
    {
        return $this->showMessage([
            "Mensaje" => "Acerca del perfil del usuario!",
            "data" => auth()->user(),
        ]);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return $this->showMessage([
            "Mensaje" => "¡Sesión cerrada con éxito!",
        ]);
    }


    public function index()
    {
        if (Auth::user()->rol_id == 1) {
            $users = User::all();
            return $this->successResponse([
                "data" => $users,
                "Mensaje" => "Usuario Admin",
            ]);

        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    public function show($id)
    {
        if (Auth::user()->rol_id == 1) {
            $users = User::findOrfail($id);
            return $this->showOne($users);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Usuario no permitido",
            ]);
        }
    }

    public function update(Request $request, $id)
    {

        if (Auth::user()->rol_id == 1) {
            $users = User::findOrFail($request->id);
            $users->name = $request->name;
            $users->first_last_name = $request->first_last_name;
            $users->second_last_name = $request->second_last_name;
            $users->email = $request->email;
            // $users->email_verified_at = $request->email_verified_at;
            $users->password = Hash::make($request->password);
            // $users->c_password = $request->c_password;
            // $users->rol_id = $request->rol_id;
            return $this->successResponse([
                "Mensaje" => "¡Usuario actualizado con éxito!",
                $users->save(),200
            ]);
            // return response()->json($users->save(), 200);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Hubo un error.",
            ]);
        }
    }

    public function delete(Request $request, $id)
    {
        if (Auth::user()->rol_id == 1) {
            $users = User::destroy($request->id);
            return $this->successResponse([
                "Mensaje" => "¡Usuario eliminado con éxito!",
                "Usuario eliminado:"=>$users,
            ]);
        } else {
            return $this->errorResponse([
                "Mensaje" => "Hubo un error.",
            ]);
        }
    }
}
