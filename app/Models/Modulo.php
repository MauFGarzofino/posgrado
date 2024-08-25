<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $table = 'modulos'; // Nombre de la tabla
    protected $primaryKey = 'id_modulo'; // Clave primaria

    protected $fillable = [
        'nombre',
        'estado'
    ];

    // Relación de un módulo con muchos menús principales
    public function menusPrincipales()
    {
        return $this->hasMany(MenuPrincipal::class, 'id_modulo');
    }
}
