<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reserva extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['cliente_id', 'habitacion_id', 'fecha_inicio', 'fecha_fin'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class);
    }

    public function factura()
    {
        return $this->hasOne(Factura::class);
    }
}
