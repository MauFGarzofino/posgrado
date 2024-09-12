<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaDocente extends Model
{
    use HasFactory;

    protected $table = 'personas_docentes'; // Especifica el nombre de la tabla
    protected $primaryKey = 'id_persona_docente'; // Clave primaria

    protected $fillable = [
        'id_persona',
        'fecha_ingreso',
        'fecha',
        'estado'
    ];

    // Relación con la tabla `personas`
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona', 'id_persona');
    }
}
