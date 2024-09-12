<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosgradoMaterias extends Model
{
    use HasFactory;

    protected $table = 'posgrado_materias';
    protected $primaryKey = 'id_posgrado_materia';

    protected $fillable = [
        'id_posgrado_programa',
        'id_posgrado_nivel',
        'sigla',
        'nombre',
        'nivel_curso',
        'cantidad_hora_teorica',
        'cantidad_hora_practica',
        'cantidad_hora_laboratorio',
        'cantidad_hora_plataforma',
        'cantidad_hora_virtual',
        'cantidad_credito',
        'color',
        'icono',
        'imagen',
        'estado',
    ];

    // Relación con PosgradosProgramas
    public function programa()
    {
        return $this->belongsTo(PosgradosProgramas::class, 'id_posgrado_programa');
    }

    // Relación con PosgradoNiveles
    public function nivel()
    {
        return $this->belongsTo(PosgradoNivel::class, 'id_posgrado_nivel');
    }
}
