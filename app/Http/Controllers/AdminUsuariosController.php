<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUsuariosController extends Controller
{
    public function indexAdministradores(){
        return view('administrador.index_usuarios_admin');
    }

    public function indexProveedores(){
        return view('administrador.index_usuarios_prov');
    }

    public function indexClientes(){
        return view('administrador.index_usuarios_clientes');
    }
}
