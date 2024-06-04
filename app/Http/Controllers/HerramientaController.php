<?php

namespace App\Http\Controllers;

use App\Models\Herramienta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HerramientaController extends Controller
{
    public function index()
    {
        $herramientas = Herramienta::all();
        return response()->json($herramientas);
    }

    public function create()
    {
    }

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
            $filename = Str::uuid() . '.webp';
            $imagePath = public_path('storage/photos/' . $filename);

            $source = imagecreatefromstring(file_get_contents($file));
            $newWidth = 800;
            $newHeight = 800;

            $destination = imagecreatetruecolor($newWidth, $newHeight);
            $width = imagesx($source);
            $height = imagesy($source);

            imagecopyresampled($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
            imagewebp($destination, $imagePath, 100);

            imagedestroy($source);
            imagedestroy($destination);

            $validatedData['foto_url'] = 'photos/' . $filename;
        }

        $herramienta = Herramienta::create($validatedData);

        return response()->json($herramienta, 201);
    }

    public function show($id)
    {
        $herramienta = Herramienta::find($id);

        if (!$herramienta) {
            return response()->json(['message' => 'Herramienta no encontrada'], 404);
        }

        return response()->json($herramienta, 200);
    }

    public function edit(Herramienta $herramienta)
    {
    }

    public function update(Request $request, Herramienta $herramienta)
    {
    }

    public function destroy(Herramienta $herramienta)
    {
    }
}
