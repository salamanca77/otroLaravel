<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('impresiones.tienda-1', function ($user) {
    // Cualquiera con un token de Sanctum válido puede escuchar.
    // Puedes añadir lógica de roles/permisos aquí si es necesario.
    return $user !== null;
});