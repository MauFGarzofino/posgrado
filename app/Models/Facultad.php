<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultades';
    protected $primaryKey = 'id_facultad';

    protected $fillable = [
        'nombre',
        'nombre_abreviado',
        'direccion',
        'telefono',
        'telefono_interno',
        'fax',
        'email',
        'latitud',
        'longitud',
        'fecha_creacion',
        'escudo',
        'imagen',
        'estado_virtual',
        'estado',
        'id_area'
    ];

    // Una facultad pertenece a un área
    public function area()
    {
        return $this->belongsTo(Area::class, 'id_area');
    }
}
