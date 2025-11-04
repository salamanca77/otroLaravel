<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Imprimiendo Ticket...</title>
    <style>
        body { font-family: monospace; margin: 0; padding: 20px; background-color: #f7f7f7; }
        .ticket {
            max-width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: white;
        }
        #status {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .exito { background: #d4edda; color: #155724; }
        .error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <div class="ticket">
        <h2 style="text-align: center;">Ticket de Estacionamiento</h2>
        <p><strong>Placa:</strong> {{ $registro->placa }}</p>
        <p><strong>Entrada:</strong> {{ \Carbon\Carbon::parse($registro->fecha_entrada)->format('d/m/Y H:i') }}</p>
        @if($registro->fecha_salida)
            <p><strong>Salida:</strong> {{ \Carbon\Carbon::parse($registro->fecha_salida)->format('d/m/Y H:i') }}</p>
            <p><strong>Tiempo:</strong> {{ $registro->tiempo_de_estancia }} min</p>
            <p><strong>Monto:</strong> ${{ number_format($registro->monto_a_pagar, 2) }}</p>
        @endif
        <p><strong>Tarifa:</strong> {{ $registro->tipo_tarifa }} (${{ number_format($registro->tarifa, 2) }})</p>
    </div>

    <div id="status">Contactando impresora...</div>

    <div style="text-align: center; margin-top: 20px;">
        <button onclick="imprimirTicket()">Imprimir de Nuevo</button>
        <a href="{{ route('controlVehicular.ticket.salida') }}" style="padding: 10px 15px; background-color: #f0f0f0; text-decoration: none; color: black; border: 1px solid #ccc; border-radius: 3px;">Volver</a>
    </div>

    <script>
        // Esta función se encarga de la lógica de impresión
        async function imprimirTicket() {
            const statusDiv = document.getElementById('status');
            statusDiv.textContent = 'Enviando a la impresora en la red local...';
            statusDiv.className = '';

            // 1. Construir el contenido de texto para el ticket
            const ticketTexto = `
================================
   TICKET DE ESTACIONAMIENTO
================================
Placa:         {{ $registro->placa }}
Entrada:       {{ \Carbon\Carbon::parse($registro->fecha_entrada)->format('d/m/Y H:i') }}
@if($registro->fecha_salida)
Salida:        {{ \Carbon\Carbon::parse($registro->fecha_salida)->format('d/m/Y H:i') }}
Tiempo:        {{ $registro->tiempo_de_estancia }} min
--------------------------------
MONTO A PAGAR: $ {{ number_format($registro->monto_a_pagar, 2) }}
--------------------------------
@endif
Tarifa:        {{ $registro->tipo_tarifa }}
(${{ number_format($registro->tarifa, 2) }})

      ¡Gracias por su visita!
================================
            `;

            try {
                // 2. Llamar al servidor de impresión en la PC con la IP privada
                const response = await fetch('http://192.168.100.213:3000/imprimir-texto', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        contenido: ticketTexto,
                        impresora: 'EPSON L220 Series' // Nombre exacto de tu impresora
                    })
                });

                const data = await response.json();

                if (data.exito) {
                    statusDiv.textContent = '✅ ¡Ticket enviado a la impresora!';
                    statusDiv.className = 'exito';
                } else {
                    statusDiv.textContent = '❌ Error desde el servidor de impresión: ' + (data.error || 'Error desconocido');
                    statusDiv.className = 'error';
                }

            } catch (error) {
                // 3. Manejar errores de conexión (firewall, red, etc.)
                console.error('Error de conexión directa:', error);
                statusDiv.textContent = '❌ No se pudo conectar con la PC. Verifique la red y el firewall.';
                statusDiv.className = 'error';
                alert('Error de conexión: No se pudo contactar a la impresora. Verifique que la PC (Estación de Impresión) esté encendida y el servidor de Node.js esté activo.');
            }
        }

        // Imprime automáticamente cuando la página carga
        window.onload = function() {
            imprimirTicket();
        };
    </script>

</body>
</html>