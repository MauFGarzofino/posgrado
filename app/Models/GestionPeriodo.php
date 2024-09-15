<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionPeriodo extends Model
{
    use HasFactory;

    protected $table = 'gestiones_periodos';
    protected $primaryKey = 'id_gestion_periodo';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];
}
