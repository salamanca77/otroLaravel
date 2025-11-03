<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class ControlVehicularController extends Controller
{
    public function imprimir($id)
    {
        $registro = Registro::findOrFail($id);
        return view('controlVehicular.imprimir', compact('registro'));
    }
}