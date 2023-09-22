<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AsignarRol extends Controller
{
    public function asignar(){
        $user = User::find(3);
        if ($user) {
            $user->assignRole('proveedor');
            return redirect()->back()->with('success', 'Rol asignado correctamente');
        } else {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }


    }


}
