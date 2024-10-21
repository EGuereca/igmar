<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['factura_id', 'monto', 'fecha_pago'];

    public function factura()
    {
        return $this->belongsTo(Factura::class);
    }
}
