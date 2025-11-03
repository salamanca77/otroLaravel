<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use Illuminate\Http\Request;

class ImpresionController extends Controller
{
    public function marcarImpreso(Registro $registro)
    {
        $registro->impreso_en = now();
        $registro->save();

        return response()->json(['message' => 'Registro marcado como impreso.']);
    }
}