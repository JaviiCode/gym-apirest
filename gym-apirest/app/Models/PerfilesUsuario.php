<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilesUsuario extends Model
{
    /** @use HasFactory<\Database\Factories\PerfilesUsuarioFactory> */
    use HasFactory;
    protected $table = 'perfilesusuario';

    protected $primaryKey = 'id_perfil';

    protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'edad',
        'direccion',
        'telefono',
        'foto',
        'fecha_nacimiento',
    ];
    public function perfilUsuario()
    {
        return $this->hasMany(Usuarios::class, 'id_usuario');
    }
}

