<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';

    public $timestamps = false;

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombre',
        'apellido',
        'correo_electronico',
        'contrasena_hash',
        'direccion',
        'fecha_nacimiento',
        'biografia',
        'preferencia_comunicacion',
        'estado_cuenta',
        'big_foto_url',
        'little_foto_url',
    ];

    protected $hidden = [
        'contrasena_hash',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['contrasena_hash'] = bcrypt($password);
    }

    public function getAuthPassword()
    {
        return $this->contrasena_hash;
    }
}
