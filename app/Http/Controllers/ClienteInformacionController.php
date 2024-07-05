<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteInformacionController extends Controller
{
    public function indexClienteInformacion(){

        return view('cliente.informacion');
    }
}
