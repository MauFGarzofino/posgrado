<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $table = 'localidades';
    protected $primaryKey = 'id_localidad';
    protected $fillable = ['id_provincia', 'nombre', 'estado'];

    // Relación con Provincia
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }
}

