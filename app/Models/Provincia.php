<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table = 'provincias';
    protected $primaryKey = 'id_provincia';
    protected $fillable = ['id_departamento', 'nombre', 'estado'];

    // Relación con Departamento
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    // Relación con Localidad
    public function localidades()
    {
        return $this->hasMany(Localidad::class, 'id_provincia');
    }
}
