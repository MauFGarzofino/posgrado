<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolMenuPrincipal extends Model
{
    use HasFactory;

    protected $table = 'roles_menus_principales'; // Nombre de la tabla
    protected $primaryKey = 'id_rol_menu_principal'; // Clave primaria

    protected $fillable = [
        'id_rol',
        'id_menu_principal',
        'estado'
    ];

    // Relación de un rol-menu-principal que pertenece a un rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    // Relación de un rol-menu-principal que pertenece a un menú principal
    public function menuPrincipal()
    {
        return $this->belongsTo(MenuPrincipal::class, 'id_menu_principal');
    }
}
