<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedore extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'contacto'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
