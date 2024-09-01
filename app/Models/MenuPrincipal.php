<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuPrincipal extends Model
{
    use HasFactory;

    protected $table = 'menus_principales';
    protected $primaryKey = 'id_menu_principal';

    protected $fillable = [
        'nombre',
        'icono',
        'orden',
        'estado',
        'id_modulo'
    ];

    // Relación de un menú principal que pertenece a un módulo
    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo');
    }

    // Relación de un menú principal con muchos menús secundarios
    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_menu_principal');
    }

    // Relación de un menú principal con muchos roles
    public function roles()
    {
        return $this->belongsToMany(Rol::class, 'roles_menus_principales', 'id_menu_principal', 'id_rol')
            ->withPivot('estado');
    }
}
