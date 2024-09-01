<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';
    protected $primaryKey = 'id_persona';
    protected $fillable = [
        'nombres',
        'apellidos',
        'email',
        'ci',
        'imagen',
    ];

    // Relación uno a uno con el modelo Usuario
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_persona', 'id_persona');
    }
}
