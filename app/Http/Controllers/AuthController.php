<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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
            'foto_perfil' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = new User([
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

        if ($request->hasFile('foto_perfil')) {
            $file = $request->file('foto_perfil');
            $bigFilename = time() . '_big_' . Str::uuid() . '.webp';
            $littleFilename = time() . '_little_' . Str::uuid() . '.webp';

            // Path for saving images
            $bigImagePath = public_path('storage/profiles/big/' . $bigFilename);
            $littleImagePath = public_path('storage/profiles/little/' . $littleFilename);

            // Ensure the directories exist
            if (!file_exists(public_path('storage/profiles/big'))) {
                mkdir(public_path('storage/profiles/big'), 0755, true);
            }
            if (!file_exists(public_path('storage/profiles/little'))) {
                mkdir(public_path('storage/profiles/little'), 0755, true);
            }

            // Create and save big image
            $bigSource = imagecreatefromstring(file_get_contents($file));
            $bigWidth = 800;
            $bigHeight = 800;

            $bigDestination = imagecreatetruecolor($bigWidth, $bigHeight);
            $width = imagesx($bigSource);
            $height = imagesy($bigSource);

            imagecopyresampled($bigDestination, $bigSource, 0, 0, 0, 0, $bigWidth, $bigHeight, $width, $height);
            imagewebp($bigDestination, $bigImagePath, 100);

            imagedestroy($bigSource);
            imagedestroy($bigDestination);

            // Create and save little image
            $littleSource = imagecreatefromstring(file_get_contents($file));
            $littleWidth = 200;
            $littleHeight = 200;

            $littleDestination = imagecreatetruecolor($littleWidth, $littleHeight);
            imagecopyresampled($littleDestination, $littleSource, 0, 0, 0, 0, $littleWidth, $littleHeight, $width, $height);
            imagewebp($littleDestination, $littleImagePath, 100);

            imagedestroy($littleSource);
            imagedestroy($littleDestination);

            $user->big_foto_url = 'profiles/big/' . $bigFilename;
            $user->little_foto_url = 'profiles/little/' . $littleFilename;
        }

        $user->save();

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json(['token' => $token], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}
