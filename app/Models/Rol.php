<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles'; // Nombre de la tabla
    protected $primaryKey = 'id_rol'; // Clave primaria

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];

    // Relación de un rol con muchos menús principales
    public function menusPrincipales()
    {
        return $this->belongsToMany(MenuPrincipal::class, 'roles_menus_principales', 'id_rol', 'id_menu_principal')
            ->withPivot('estado');
    }
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol', 'id_rol');
    }
}
