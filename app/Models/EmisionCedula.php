<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmisionCedula extends Model
{
    use HasFactory;

    protected $table = 'emision_cedulas';
    protected $primaryKey = 'id_emision_cedula';
    protected $fillable = ['nombre', 'descripcion', 'estado'];
}
