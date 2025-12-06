<?php

namespace App\Http\Controllers\Pixel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CapiController extends Controller
{
    public function vehicleCheckIn(Request $request, $cliente, $test_event_code = null)
    {
        $pixel_id = '724475990694850';
        $token = 'EAA86FKeGdcUBQDIYPek4ZAa2C6kScXGGnIIZCnG2wr77eKqAIZCYhxZAUdnDIQM4fk850EQ7PHKnJbXSlZCHE01gDBQZCi1Ofm6aZAehNSZC5oRmXOvhVCKCqSyllPfoPz7zPLiD9JVccKFjdhqJZBjlJ2pCMBJyJhcxZBLvFwxNkbDlcMRfLStY00jfwU6MDI7IKo3gZDZD';

        $payload = [
            "data" => [
                [
                    "event_name" => "VehicleCheckIn",
                    "event_time" => time(),
                    "event_id" => uniqid(),
                    "action_source" => "website",
                    "user_data" => [
                        "client_ip_address" => $request->ip(),
                        "client_user_agent" => $request->userAgent(),
                        "fbc" => $request->cookie('_fbc'),
                        "fbp" => $request->cookie('_fbp'),
                    ],
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
