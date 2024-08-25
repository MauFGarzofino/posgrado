<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus'; // Nombre de la tabla
    protected $primaryKey = 'id_menu'; // Clave primaria

    protected $fillable = [
        'nombre',
        'directorio',
        'icono',
        'imagen',
        'color',
        'orden',
        'estado',
        'id_menu_principal'
    ];

    // Relación de un menú que pertenece a un menú principal
    public function menuPrincipal()
    {
        return $this->belongsTo(MenuPrincipal::class, 'id_menu_principal');
    }
}
