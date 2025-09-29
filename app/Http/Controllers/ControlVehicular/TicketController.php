<?php

namespace App\Http\Controllers\ControlVehicular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          return view('controlVehicular.dashboard');   

    }

  public function store(Request $request){

    // return $request;
    $data = $request->validate([
        'nombre'=> 'required|string',  // Cambiar 'name' a 'nombre'
        'placa' => 'required|string',  // Quitar el espacio antes de 'required'
        'entrada' => 'required|string'   // Quitar el espacio antes de 'required'
    ]);

    try {
        // Enviar datos a n8n
        $response = Http::post('https://agente-vendedor.yersin.dev/webhook/ac004602-8309-4bfe-9cbf-b4e6abdb9d7a', [
            'nombre' => $data['nombre'],
            'placa' => $data['placa'],
            'tipo' => $data['entrada']
        ]);

        // Verificar si la petición fue exitosa
        if ($response->successful()) {
            return redirect()->back()->with('success', 'Curso creado exitosamente');
        } else {
            return redirect()->back()->with('error', 'Error al comunicarse con el servicio: ' . $response->status());
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

}
