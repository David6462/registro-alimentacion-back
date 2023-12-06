<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUser()
    {
        $user = Auth::user();

        // Verificar si el usuario está autenticado
        if ($user) {
            // Devolver los datos del usuario
            return response()->json($user);
        } else {
            // El usuario no está autenticado
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }
    }

    public function update(Request $request){
		$alimento = User::updateOrCreate(
			['id' => $request->id],
			$request->all()
		);
		return response()->json($alimento);
    }
}
