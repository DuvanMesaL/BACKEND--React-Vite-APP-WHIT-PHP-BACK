<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Herramienta extends Model
{
    use HasFactory;

    protected $table = 'herramientas';

    protected $fillable = [
        'nombre',
        'codigo_herramienta',
        'descripcion',
        'estado',
        'categoria',
        'marca',
        'fecha_adquisicion',
        'ultimo_mantenimiento',
        'ubicacion_actual',
        'foto_url',
        'creado_por',
        'actualizado_por',
    ];

    public $timestamps = false;

    public function getPhotoUrlAttribute()
    {
        return $this->foto_url ? Storage::url($this->foto_url) : null;
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    public function actualizador()
    {
        return $this->belongsTo(User::class, 'actualizado_por');
    }
}
