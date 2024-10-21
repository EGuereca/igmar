<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['cliente_id', 'comentario', 'fecha'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
