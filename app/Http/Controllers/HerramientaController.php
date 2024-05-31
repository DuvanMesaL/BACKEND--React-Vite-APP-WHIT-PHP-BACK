<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use Illuminate\Http\Request;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:Disponible,Asignada,Perdida,En Mantenimiento,Eliminado',
            'categoria' => 'nullable|string|max:255',
            'fecha_adquisicion' => 'nullable|date',
            'ultimo_mantenimiento' => 'nullable|date',
            'ubicacion_actual' => 'nullable|string|max:255',
        ]);

        $herramienta = new Herramienta([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'categoria' => $request->categoria,
            'fecha_adquisicion' => $request->fecha_adquisicion,
            'ultimo_mantenimiento' => $request->ultimo_mantenimiento,
            'ubicacion_actual' => $request->ubicacion_actual,
            'creado_por' => auth()->id(),
            'actualizado_por' => auth()->id(),
        ]);

        $herramienta->save();

        return response()->json(['message' => 'Herramienta creada exitosamente', 'herramienta' => $herramienta], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Herramienta $herramienta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Herramienta $herramienta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Herramienta $herramienta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Herramienta $herramienta)
    {
        //
    }
}
