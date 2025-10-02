<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'placa',
        'fecha_entrada',
        'hora_entrada',
        'fecha_salida',
        'hora_salida',
        'obsevacion',
        'tiempo_de_estancia',
        'monto_a_pagar',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fecha_entrada' => 'datetime',
        'hora_entrada' => 'datetime:H:i',
        'fecha_salida' => 'datetime',
        'hora_salida' => 'datetime:H:i',
    ];

    /**
     * Accessor for the stay duration in minutes.
     */
    public function getTiempoDeEstanciaEnMinutosAttribute()
    {
        if (!$this->fecha_entrada || !$this->hora_entrada || !$this->hora_salida) {
            return 0;
        }

        // Asumir la misma fecha de salida si está vacía
        $fechaSalida = $this->fecha_salida ?? $this->fecha_entrada;

        $entrada = $this->fecha_entrada->copy()->setTimeFrom($this->hora_entrada);
        $salida = $fechaSalida->copy()->setTimeFrom($this->hora_salida);

        // Si la salida es antes que la entrada (ej. pasa la medianoche), añadir un día a la fecha de salida
        if ($salida->isBefore($entrada)) {
            $salida->addDay();
        }

        return $entrada->diffInMinutes($salida);
    }

    /**
     * Accessor for the stay duration in hours (decimal).
     */
    public function getTiempoDeEstanciaEnHorasAttribute()
    {
        if ($this->tiempo_de_estancia_en_minutos > 0) {
            // Ceil() redondea hacia arriba. 61 minutos se convierte en 2 horas.
            return ceil($this->tiempo_de_estancia_en_minutos / 60);
        }
        return 0;
    }

    /**
     * Accessor for the total fee to pay.
     */
    public function getTarifaAPagarAttribute()
    {
        // Necesita que se le pasen los datos de la tarifa para funcionar
        if (empty($this->tarifa) || empty($this->tipo_tarifa)) {
            return 0;
        }

        if ($this->tipo_tarifa === 'hora') {
            return $this->tiempo_de_estancia_en_horas * $this->tarifa;
        } 
        
        // Por defecto, o si es 'minuto'
        return $this->tiempo_de_estancia_en_minutos * $this->tarifa;
    }
}