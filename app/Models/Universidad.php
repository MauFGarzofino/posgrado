<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table = 'universidades'; // Especifica el nombre de la tabla
    protected $primaryKey = 'id_universidad'; // Especifica la clave primaria

    // Especifica los campos que se pueden asignar de manera masiva
    protected $fillable = [
        'nombre',
        'nombre_abreviado',
        'inicial',
        'estado'
    ];

    public function configuraciones()
    {
        return $this->hasMany(Configuracion::class, 'id_universidad');
    }

    public function areas()
    {
        return $this->hasMany(Area::class, 'id_universidad');
    }
}
