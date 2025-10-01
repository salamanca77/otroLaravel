<?php

namespace App\Http\Controllers\ControlVehicular;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TicketController extends Controller
{
    
    public function index()
    {
          return view('controlVehicular.dashboard');   

    }

    public function entrada() {
        return view('controlVehicular.entrada');
    }

    public function entrada_store(Request $request){
        
        $data = $request->validate([
            'nombre'=> 'required|string',  
            'placa' => 'required|string',  
            'entrada' => 'required|string' 
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
                return redirect()->back()->with('success', 'Entrada creada exitosamente');
            } else {
                return redirect()->back()->with('error', 'Error al comunicarse con el servicio: ' . $response->status());
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function salida(){
        return view ('controlVehicular.salida');
    }

    public function salida_store(Request $request){
        
        $data = $request->validate([
            'placa' => 'required|string',  
            'salida' => 'required|string' 
        ]);

        try {
            // Enviar datos a n8n
            $response = Http::post('https://agente-vendedor.yersin.dev/webhook/ac004602-8309-4bfe-9cbf-b4e6abdb9d7a', [
                'placa' => $data['placa'],
                'tipo' => $data['salida']
            ]);

            // Verificar si la petición fue exitosa
            if ($response->successful()) {
                return redirect()->back()->with('success', 'Salida creada exitosamente');
            } else {
                return redirect()->back()->with('error', 'Error al comunicarse con el servicio: ' . $response->status());
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
}
