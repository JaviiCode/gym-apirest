<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    /** @use HasFactory<\Database\Factories\UsuariosFactory> */
    use HasFactory;
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'email',
        'token',
        'clave',
        'fecha_registro',
    ];
    //Relaciones
    public function tipoUsuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'id_tipo_usuario');
    }
    public function perfilUsuario()
    {
        return $this->belongsTo(PerfilesUsuario::class, 'id_usuario');
    }
    public function Suscripciones()
    {
        return $this->hasMany(Suscripciones::class, 'id_cliente');
    }
}
