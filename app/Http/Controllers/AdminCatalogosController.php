<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCatalogosController extends Controller
{
    public function indexCatalogos()
    {
        return view('administrador.index_catalogos');
    }
}
