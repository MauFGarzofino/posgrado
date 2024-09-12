<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosgradoNivel extends Model
{
    use HasFactory;

    protected $table = 'posgrado_niveles';
    protected $primaryKey = 'id_posgrado_nivel';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];
}
