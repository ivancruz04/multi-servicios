<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProvIndexController extends Controller
{
    public function index(){
        $idProveedor = Auth::user()->id;
        $datos = DB::table('proveedores')->select(DB::raw('calificacion, trabajos'))->where('idUsuario','=', $idProveedor)->get();
        $cotizacionesEnCurso = DB::table('cotizaciones')->select(DB::raw('COUNT(id) AS totalCotizaciones'))->where('idProveedor','=', $idProveedor)->where('idEstatus','=', 1)->get();
        $cotizacionesCerradas = DB::table('cotizaciones')->select(DB::raw('COUNT(id) AS totalCotizacionesCerrada'))->where('idProveedor','=', $idProveedor)->where('idEstatus','=', 4)->get();

        return view ('proveedor.index',["datos" => $datos , "cotizaciones" => $cotizacionesEnCurso, "cotizacionesCerradas" => $cotizacionesCerradas]);
    }
}
