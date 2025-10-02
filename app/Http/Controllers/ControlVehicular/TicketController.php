<?php

namespace App\Http\Controllers\ControlVehicular;

use App\Http\Controllers\Controller;
use App\Models\Registro;
use App\Models\Tarifa;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            'nombre'=> 'required|string|max:255',  
            'placa' => 'required|string|max:10',  
        ]);

        Registro::create([
            'nombre' => $data['nombre'],
            'placa' => $data['placa'],
            'fecha_entrada' => Carbon::now()->toDateString(),
            'hora_entrada' => Carbon::now()->toTimeString(),
        ]);
        
       return redirect()->route('controlVehicular.ticket.entrada')->with('success', 'Registro de entrada guardado con éxito.');
    }

    public function salida(){
        return view ('controlVehicular.salida');
    }

    public function salida_store(Request $request){
        
        $data = $request->validate([
            'placa' => 'required|string|max:10',  
        ]);

        // Buscar el registro por placa que no tenga fecha de salida
        $registro = Registro::where('placa', $data['placa'])
                            ->whereNull('fecha_salida')
                            ->first();

        if (!$registro) {
            return redirect()->route('controlVehicular.ticket.salida')->with('error', 'Error: Placa no encontrada o ya se registró una salida para este vehículo.');
        }

        // Cargar la tarifa activa
        $tarifaActiva = Tarifa::find(1);

        // Asignar los datos de salida y tarifa para el cálculo
        $registro->fecha_salida = Carbon::now()->toDateString();
        $registro->hora_salida = Carbon::now()->toTimeString();
        $registro->tarifa = $tarifaActiva->tarifa; // Propiedad temporal para el accesor
        $registro->tipo_tarifa = $tarifaActiva->tipo_tarifa; // Propiedad temporal para el accesor

        // Calcular y asignar los valores finales
        $registro->tiempo_de_estancia = $registro->tiempo_de_estancia_en_minutos;
        $registro->monto_a_pagar = $registro->getTarifaAPagarAttribute(); // Usamos el accesor directamente

        $registro->save();

        return redirect()->route('controlVehicular.ticket.salida')->with('success', 'Salida registrada. Total a pagar: $' . number_format($registro->monto_a_pagar, 2));
    }

    public function lista(){
        
        return view('controlVehicular.lista');
    }

    // public function reporte(){

    //     return view('controlVehicular.reporte');
    // }

    public function registro(){
        // return 'hola';
        return view('controlVehicular.reporte');
    }
    
}