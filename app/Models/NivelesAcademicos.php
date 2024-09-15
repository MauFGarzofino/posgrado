<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelesAcademicos extends Model
{
    use HasFactory;

    protected $table = 'niveles_academicos';
    protected $primaryKey = 'id_nivel_academico';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
}
