<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';
    protected $primaryKey = 'id_departamento';
    protected $fillable = ['id_pais', 'nombre', 'estado'];

    public function pais()
    {
        return $this->belongsTo(Pais::class, 'id_pais');
    }
}
