<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'precio', 'proveedor_id'];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
