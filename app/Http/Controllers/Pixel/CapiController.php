<?php

namespace App\Http\Controllers\Pixel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CapiController extends Controller
{
    public function vehicleCheckIn($cliente, $test_event_code = null)
    {
        $pixel_id = '724475990694850';
        $token = 'EAA86FKeGdcUBQE7HDJR9MoGJcOaalrItn3J8PbaDYM0wZBdlWAfQHrWfMXUHm132JhGBZBKm7CcW0SXQ7bx6DiPJysPNtRLr7QkplUKZAQUFZA3QTxKzkECyadnT4hGQD18ifWypNO4Q6m8VSY7JZAk1S9VXJ2gsbfLZCA5sqJ75SEJzwn9mEOWFrSIIS4fNpCbAZDZD';
        $payload = [
            "data" => [
                [
                    "event_name" => "VehicleCheckIn",
                    "event_time" => time(),
                    "event_id" => uniqid(),
                    "action_source" => "website",
                    // "user_data" => [
                    //     "ph" => hash('sha256', $cliente->telefono),
                    //     "em" => hash('sha256', strtolower(trim($cliente->email))),
                    // ],
                    "custom_data" => [
                        "nombre" => $cliente['nombre'],
                        "placa" => $cliente['placa'],
                    ]
                ]
            ]
        ];

        // Si se proporciona un código de prueba, lo añadimos al payload
        if ($test_event_code) {
            $payload['test_event_code'] = $test_event_code;
        }

        $url = "https://graph.facebook.com/v18.0/$pixel_id/events?access_token=$token";

        $response = Http::post($url, $payload);
        $body = $response->json();

        // Registramos la respuesta de la API de Meta para depuración
        Log::info('Respuesta de la API de Conversiones de Facebook: ', [
            'status' => $response->status(),
            'body' => $body
        ]);

        // Forzar un error si la respuesta de la API contiene un error, para que el dd() lo atrape.
        if (isset($body['error'])) {
            throw new \Exception('Error devuelto por la API de Meta: ' . json_encode($body['error']));
        }

        return $body;
    }
}
