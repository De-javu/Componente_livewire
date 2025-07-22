<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cedula',
        'nombre',
        'apellido',
        'ciudad',
        'celular',
        'fecha_inicial',
        'fecha_final',
    ];

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
