<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSanguineo extends Model
{
    use HasFactory;

    protected $table = 'grupos_sanguineos';
    protected $primaryKey = 'id_grupo_sanguineo';
    protected $fillable = ['nombre', 'estado'];
}
