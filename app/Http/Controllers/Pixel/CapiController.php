<?php

namespace App\Http\Controllers\Pixel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        if ($test_event_code) {
            $payload['test_event_code'] = $test_event_code;
        }

        $url = "https://graph.facebook.com/v18.0/$pixel_id/events?access_token=$token";

        return Http::post($url, $payload)->json();
    }
}
