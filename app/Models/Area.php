<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas'; // Especifica el nombre de la tabla
    protected $primaryKey = 'id_area'; // Especifica la clave primaria

    protected $fillable = [
        'nombre',
        'nombre_abreviado',
        'estado',
        'id_universidad'
    ];

    // Un área pertenece a una universidad
    public function universidad()
    {
        return $this->belongsTo(Universidad::class, 'id_universidad');
    }

    // Un área tiene muchas facultades
    public function facultades()
    {
        return $this->hasMany(Facultad::class, 'id_area');
    }
}
