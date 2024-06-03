<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HerramientaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $herramientas = Herramienta::all();
        return response()->json($herramientas);
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
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string|max:50',
            'categoria' => 'nullable|string|max:100',
            'fecha_adquisicion' => 'nullable|date',
            'ultimo_mantenimiento' => 'nullable|date',
            'ubicacion_actual' => 'nullable|string|max:255',
            'foto_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'codigo_herramienta' => 'required|string|max:10',
        ]);

        if ($request->hasFile('foto_url')) {
            $file = $request->file('foto_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('photos', $filename, 'public');
            $validatedData['foto_url'] = $path;
        }

        $herramienta = new Herramienta([
            'nombre' => $validatedData['nombre'],
            'descripcion' => $validatedData['descripcion'],
            'estado' => $validatedData['estado'],
            'categoria' => $validatedData['categoria'],
            'fecha_adquisicion' => $validatedData['fecha_adquisicion'],
            'ultimo_mantenimiento' => $validatedData['ultimo_mantenimiento'],
            'ubicacion_actual' => $validatedData['ubicacion_actual'],
            'foto_url' => $validatedData['foto_url'] ?? null,
            'codigo_herramienta' => $validatedData['codigo_herramienta'],
        ]);

        $herramienta->save();

        return response()->json($herramienta, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $herramienta = Herramienta::find($id);

        if (!$herramienta) {
            return response()->json(['message' => 'Herramienta no encontrada'], 404);
        }

        return response()->json($herramienta, 200);
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
