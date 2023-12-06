<?php

namespace App\Http\Controllers;

use App\Models\Alimentos;
use Illuminate\Http\Request;

class AlimentosController extends Controller
{
    public function index(Request $request){
        $alimento = Alimentos::where('user_id', $request->user()->id);

		return response()->json($alimento->paginate(10));
    }

    public function save(Request $request){
        $alimento = Alimentos::create([
            'user_id' => $request->user()->id,
            'alimento_consumido' => $request->alimento_consumido,
            'cantidad' => $request->cantidad,
            'calorias_promedio' => $request->calorias_promedio,
            'fecha_hora' => $request->fecha_hora,
        ]);

		return response()->json($alimento);
    }
}
