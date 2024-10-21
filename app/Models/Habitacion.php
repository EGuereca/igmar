<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Habitacion extends Model
{
    use HasFactory;
    use SoftDeletes; 

    protected $fillable = ['numero_habitacion', 'tipo', 'precio_por_noche'];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
