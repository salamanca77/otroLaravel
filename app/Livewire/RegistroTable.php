<?php

namespace App\Livewire;

use App\Models\Registro;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class RegistroTable extends DataTableComponent
{
    protected $model = Registro::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setTableAttributes([
        //     'class' => 'table-auto w-full divide-y divide-gray-200',
        // ]);
    }

    public function builder(): Builder
    {
        return Registro::query();
    }

    public function columns(): array
    {
        return [
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),

            Column::make("Placa", "placa")
                ->sortable()
                ->searchable(),

            Column::make("Fecha entrada", "fecha_entrada")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format('d/m/y')),

            Column::make("Hora entrada", "hora_entrada")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format('H:i')),

            Column::make("Fecha salida", "fecha_salida")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format('d/m/y')),

            Column::make("Hora salida", "hora_salida")
                ->sortable()
                ->format(fn($value) => Carbon::parse($value)->format('H:i')),
            Column::make("Observación", "obsevacion")
                ->searchable(),

            Column::make("Tiempo de estancia (min)", "tiempo_de_estancia")
                ->sortable(),

            Column::make("Monto a pagar", "monto_a_pagar")
                ->sortable()
                ->format(fn($value) => '$' . number_format($value, 2)),

            Column::make("Tipo de tarifa", "tipo_tarifa")
                ->sortable(),

            Column::make("Tarifa", "tarifa")
                ->sortable()
                ->format(fn($value) => '$' . number_format($value, 2)),
        ];
    }
}
