<?php

namespace App\Events;

use App\Models\Registro;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RegistroCreadoEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Registro $registro;

    public function __construct(Registro $registro)
    {
        $this->registro = $registro;
    }

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('impresiones.tienda-1'),
        ];
    }

    public function broadcastAs(): string
    {
        return 'RegistroCreadoEvent';
    }
}