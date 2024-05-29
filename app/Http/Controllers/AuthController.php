<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            $credentials = [
                'correo_electronico' => $request->email,
                'password' => $request->password,
            ];

            if (!Auth::attempt($credentials)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }

            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return response()->json(['token' => $token], 200);
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred. Please try again.'], 500);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|string|unique:usuarios',
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'email' => 'required|string|email|unique:usuarios,correo_electronico',
            'password' => 'required|string|confirmed',
            'direccion' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'biografia' => 'nullable|string',
            'preferencia_comunicacion' => 'nullable|string',
        ]);

        $user = User::create([
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo_electronico' => $request->email,
            'contrasena_hash' => Hash::make($request->password),
            'direccion' => $request->direccion,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'biografia' => $request->biografia,
            'preferencia_comunicacion' => $request->preferencia_comunicacion,
            'estado_cuenta' => 'Activo',
            'id_rol' => 2, // Asignar el rol por defecto como 2
        ]);

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }
}
