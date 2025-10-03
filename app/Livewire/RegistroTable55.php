<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Registro;

class RegistroTable extends DataTableComponent
{
    protected $model = Registro::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "nombre")
                ->sortable(),
            Column::make("Placa", "placa")
                ->sortable(),
            Column::make("Fecha entrada", "fecha_entrada")
                ->sortable(),
            Column::make("Hora entrada", "hora_entrada")
                ->sortable(),
            Column::make("Fecha salida", "fecha_salida")
                ->sortable(),
            Column::make("Hora salida", "hora_salida")
                ->sortable(),
            Column::make("Obsevacion", "obsevacion")
                ->sortable(),
            Column::make("Tiempo de estancia", "tiempo_de_estancia")
                ->sortable(),
            Column::make("Monto a pagar", "monto_a_pagar")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
    }
}
