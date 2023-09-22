<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BienvenidosController extends Controller
{
    public function indexBienvenidos(){
        return view('portal');
    }
}
