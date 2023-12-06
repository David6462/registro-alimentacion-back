<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $password = Hash::make($request->password);
        $data = [
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => $password,
            'tipo_identificacion' => $request->tipo_identificacion,
            'numero_identificacion' => $request->numero_identificacion,
            'genero' => $request->genero,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'foto_cedula_frente' => $request->foto_cedula_frente,
            'foto_cedula_reverso' => $request->foto_cedula_reverso,
            'foto_rostro' => $request->foto_rostro,
            'estado' => $request->estado,
        ];

        $user = User::create($data);

        return response()->json($user);
    }

    public function login(Request $request)
    {
        $myTTL = 525600; //minutes
        JWTAuth::factory()->setTTL($myTTL);
        // Intentar autenticar al usuario
        if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Devolver el token y la información del usuario
        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
