<?php

namespace App\Http\Controllers\ControlVehicular;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pixel\CapiController;
use App\Models\ImpresionePendiente;
use App\Models\Registro;
use App\Models\Tarifa;
use Carbon\Carbon;
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
            'nombre'=> 'required|string|max:255',  
            'placa' => 'required|string|max:10',  
        ]);

        Registro::create([
            'nombre' => $data['nombre'],
            'placa' => $data['placa'],
            'fecha_entrada' => Carbon::now()->toDateString(),
            'hora_entrada' => Carbon::now()->toTimeString(),
        ]);
        
        // Dispara el evento para  Pixel de Facebook CAPI
        app(CapiController::class)->vehicleCheckIn($request, $data);

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

        // Dispara el evento para la impresión en tiempo real
        \App\Events\RegistroCreadoEvent::dispatch($registro);

        ImpresionePendiente::create([
            'registro_id' => $registro->id,
            'estado' => 'pendiente'
        ]);
        
        // return redirect()->route('controlVehicular.ticket.salida')->with('success', 'Salida registrada. Total a pagar: $' . number_format($registro->monto_a_pagar, 2));
        // return redirect()->route('controlVehicular.ticket.imprimir', ['id' => $registro->id]);
        return redirect()->route('controlVehicular.ticket.salida')->with('success', 'Registro de salida guardado con éxito.');
    }

    public function lista(){
        
        return view('controlVehicular.lista');
    }

    public function registro(){
        // return 'hola';
        return view('controlVehicular.reporte');
    }

    // Este es ahora el método correcto y único para mostrar la página de impresión.
    public function imprimir($id){
        $registro = Registro::findOrFail($id);
        return view('controlVehicular.imprimir', compact('registro'));
    }

    
    public function impresionesPendientes()
    {
        $tickets = ImpresionePendiente::where('estado', 'pendiente')
            ->with('registro')
            ->get()
            ->map(function($impresion) {
                return [
                    'id' => $impresion->id,
                    'nombre' => $impresion->registro->nombre,
                    'placa' => $impresion->registro->placa,
                    'fecha_entrada' => $impresion->registro->fecha_entrada,
                    'fecha_salida' => $impresion->registro->fecha_salida,
                    'monto_a_pagar' => $impresion->registro->monto_a_pagar,
                ];
            });
        return response()->json($tickets);
    }

    public function marcarImpresion($id)
    {
        $impresion = ImpresionePendiente::find($id);
        if ($impresion) {
            $impresion->estado = 'impreso';
            $impresion->save();
        }
        return response()->json(['success' => true]);
    }
}