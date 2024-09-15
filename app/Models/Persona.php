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
        'paterno',
        'materno',
        'numero_identificacion_personal',
        'id_localidad',
        'id_emision_cedula',
        'id_sexo',
        'id_grupo_sanguineo',
        'fecha_nacimiento',
        'direccion',
        'latitud',
        'longitud',
        'telefono_celular',
        'telefono_fijo',
        'zona',
        'id_estado_civil',
        'email',
        'fotografia',
        'usuario',
        'password',
        'abreviacion_titulo',
        'estado',
    ];

    // Relación uno a uno con Usuario
    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_persona', 'id_persona');
    }

    // Relación con Localidad
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'id_localidad');
    }

    // Relación con Emisión Cédula
    public function emisionCedula()
    {
        return $this->belongsTo(EmisionCedula::class, 'id_emision_cedula');
    }

    // Relación con Sexo
    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'id_sexo');
    }

    // Relación con Grupo Sanguíneo
    public function grupoSanguineo()
    {
        return $this->belongsTo(GrupoSanguineo::class, 'id_grupo_sanguineo');
    }

    // Relación con Estado Civil
    public function estadoCivil()
    {
        return $this->belongsTo(EstadoCivil::class, 'id_estado_civil');
    }
}
