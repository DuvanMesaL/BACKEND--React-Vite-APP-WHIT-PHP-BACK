<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios'; // Especifica la tabla correcta

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombre',
        'correo_electronico',
        'contrasena_hash',
        'id_rol',
        'estado_cuenta',
        'direccion',
        'fecha_nacimiento',
        'biografia',
        'preferencia_comunicacion',
        'eliminado',
    ];

    protected $hidden = [
        'contrasena_hash', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Método para obtener la contraseña para la autenticación
    public function getAuthPassword()
    {
        return $this->contrasena_hash;
    }

    // Métodos para redefinir los atributos 'email'
    public function getEmailAttribute()
    {
        return $this->attributes['correo_electronico'];
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['correo_electronico'] = $value;
    }
}
