<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    use SoftDeletes; 
    protected $fillable = ['nombre', 'email', 'telefono']; 

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
