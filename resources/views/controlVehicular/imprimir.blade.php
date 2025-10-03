<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Imprimir Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .ticket {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qz-tray/2.1.0/qz-tray.js"></script>
</head>

<body>
    <div class="ticket">
        <h2>Ticket de Salida</h2>
        <p><strong>Nombre:</strong> {{ $registro->nombre }}</p>
        <p><strong>Placa:</strong> {{ $registro->placa }}</p>
        <p><strong>Fecha entrada:</strong> {{ \Carbon\Carbon::parse($registro->fecha_entrada)->format('d/m/Y H:i') }}
        </p>
        <p><strong>Fecha salida:</strong> {{ \Carbon\Carbon::parse($registro->fecha_salida)->format('d/m/Y H:i') }}</p>
        <p><strong>Tiempo de estancia:</strong> {{ $registro->tiempo_de_estancia }} min</p>
        <p><strong>Monto a pagar:</strong> ${{ number_format($registro->monto_a_pagar, 2) }}</p>
        <p><strong>Tipo de tarifa:</strong> {{ $registro->tipo_tarifa }}</p>
        <p><strong>Tarifa:</strong> ${{ number_format($registro->tarifa, 2) }}</p>
    </div>
    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                window.location.href = "{{ route('controlVehicular.ticket.salida') }}";
            }, 1000); // Espera 1 segundo antes de redirigir
        };

        qz.websocket.connect().then(() => {
            var config = qz.configs.create("Nombre de la impresora"); // Cambia por el nombre real
            var data = [{
                type: 'raw',
                format: 'plain',
                data: 'Texto del ticket a imprimir\nOtra línea\n'
            }];
            qz.print(config, data).catch(console.error);
        });
    </script>
</body>

</html>
