<?php

namespace App\Http\Controllers\Pixel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class CapiController extends Controller
{
    public function vehicleCheckIn($cliente)
    {
        $pixel_id = '724475990694850';
        $token = 'EAA86FKeGdcUBQK6aTIAfmUNcAE8YZCQ43vhcMWW0BwDcq4PgZApjOnFj8rvkCuuLSMI3XQiMRfrOPE1zzCRtRfNZCxNxNDPOZAZA9eZC3jP8jygshIvEljfvbLqkVci8tqugQlnokOuJbdXWTUmpZAZAkTqi2uQM2zTJZCCnhNecOTRJpvTJ671hWeazG5eWtbYe3VAZDZD';

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

        $url = "https://graph.facebook.com/v18.0/$pixel_id/events?access_token=$token";

        return Http::post($url, $payload)->json();
    }
}
