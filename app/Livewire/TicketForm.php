<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tarifa;

class TicketForm extends Component
{
    // Propiedades de la Tarifa
    public $tarifa = 0;
    public string $tipo_tarifa = 'minuto';

    /**
     * Cargar la tarifa desde la BD cuando el componente se inicializa.
     */
    public function mount()
    {
        $this->cargarTarifa();
    }

    /**
     * Carga los datos de la tarifa activa desde la base de datos.
     */
    public function cargarTarifa()
    {
        $tarifaActiva = Tarifa::find(1);
        if ($tarifaActiva) {
            // Formatear para la vista
            $this->tarifa = number_format($tarifaActiva->tarifa, 2, ',', '.');
            $this->tipo_tarifa = $tarifaActiva->tipo_tarifa;
        }
    }

    /**
     * Guarda la configuración de la tarifa actual en la base de datos.
     */
    public function guardarTarifa()
    {
        // Validar usando una regla personalizada para el formato de la tarifa.
        $this->validate([
            'tarifa' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_contains($value, '.')) {
                        // Falla si el usuario usa un punto.
                        return $fail('Por favor, use una coma (,) como separador decimal.');
                    }
                    // Comprueba si el valor es numérico después de reemplazar la coma.
                    $numericValue = str_replace(',', '.', $value);
                    if (!is_numeric($numericValue) || floatval($numericValue) < 0) {
                        return $fail('El campo tarifa debe ser un número válido y positivo.');
                    }
                },
            ],
            'tipo_tarifa' => 'required|in:minuto,hora',
        ]);

        // Si la validación pasa, se procede a guardar.
        $this->tarifa = str_replace(',', '.', $this->tarifa);

        $tarifaActiva = Tarifa::find(1);
        if ($tarifaActiva) {
            $tarifaActiva->update([
                'tarifa' => $this->tarifa,
                'tipo_tarifa' => $this->tipo_tarifa,
            ]);
        }

        session()->flash('message', 'Tarifa actualizada con éxito.');

        // Recargar y formatear el valor para mantener la consistencia en la vista.
        $this->cargarTarifa();
    }

    public function render()
    {
        return view('livewire.ticket-form');
    }
}
