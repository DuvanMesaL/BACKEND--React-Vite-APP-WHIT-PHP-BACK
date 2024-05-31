<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herramienta extends Model
{
    use HasFactory;

    protected $table = 'herramientas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
        'categoria',
        'fecha_adquisicion',
        'ultimo_mantenimiento',
        'ubicacion_actual',
        'creado_por',
        'actualizado_por',
    ];

    public $timestamps = false; // Deshabilitar timestamps

    // Relación con el modelo Usuario (creado por y actualizado por)
    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }

    public function actualizador()
    {
        return $this->belongsTo(User::class, 'actualizado_por');
    }
}
