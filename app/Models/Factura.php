<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factura extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['reserva_id', 'total', 'fecha_emision'];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
