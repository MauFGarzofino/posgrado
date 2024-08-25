<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuraciones';
    protected $primaryKey = 'id_configuracion';

    protected $fillable = [
        'tipo',
        'descripcion',
        'estado',
        'id_universidad'
    ];

    // Una configuración pertenece a una universidad
    public function universidad()
    {
        return $this->belongsTo(Universidad::class, 'id_universidad');
    }
}
