<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validación de campos
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Intento de inicio de sesión
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autenticación exitosa
            $user = Auth::user();

            // Redirige al usuario según su rol
            if ($user->rol === 1) {
                return redirect()->route('inicio');
            } elseif ($user->rol === 2) {
                return redirect()->route('proveedor/inicio');
            } elseif ($user->rol === 3) {
                return redirect()->route('cliente/inicio');
            }
            // return redirect()->intended('index'); // Redirecciona a la ruta deseada después del inicio de sesión exitoso
        } else {
            // Autenticación fallida
            return redirect()->back()->withInput()->withErrors(['email' => 'Credenciales inválidas']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar sesión del usuario

        $request->session()->invalidate(); // Invalidar la sesión actual
        $request->session()->regenerateToken(); // Regenerar el token CSRF

        return redirect('login'); // Redirigir a la página de inicio de sesión
    }
}
