<?php

namespace App\Http\Controllers\Pixel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CapiController extends Controller
{
    public function vehicleCheckIn($cliente)
    {
        $pixel_id = 'TU-PIXEL-ID';
        $token = 'TU-ACCESS-TOKEN';

        $payload = [
            "data" => [
                [
                    "event_name" => "VehicleCheckIn",
                    "event_time" => time(),
                    "event_id" => uniqid(),
                    "action_source" => "website",
                    "user_data" => [
                        "ph" => hash('sha256', $cliente->telefono),
                        "em" => hash('sha256', strtolower(trim($cliente->email))),
                    ],
                    "custom_data" => [
                        "nombre" => $cliente->nombre,
                        "placa" => $cliente->placa,
                    ]
                ]
            ]
        ];

        $url = "https://graph.facebook.com/v18.0/$pixel_id/events?access_token=$token";

        return Http::post($url, $payload)->json();
    }
}
