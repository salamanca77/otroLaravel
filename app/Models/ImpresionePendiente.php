<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImpresionePendiente extends Model
{
    protected $fillable = [
        'registro_id',
        'estado' 
    ];

    public function registro(){
        return $this->belongsTo(Registro::class);
    }
}
