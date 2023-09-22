<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteIndexController extends Controller
{
    public function index(){
        return view ('cliente.index');
    }
}
