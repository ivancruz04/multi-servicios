<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteProveedoresController extends Controller
{

    public function indexVerProveedores()
    {

        $servicios = DB::table('servicios')->select('*')->orderBy('nombreServicio')->get();
        $proveedores = DB::table('v_usuarios_proveedores_todo')->select(DB::raw('id, nombreComercial, estrellas, descripcionServicio, logotipo, calificacion'))->where('estatus', '=', 1)->get();
        return view('cliente.ver_proveedores', ["proveedores" => $proveedores, "servicios" => $servicios]);
    }

    public function buscarProveedores(Request $request)
    {

        $idServicio = $request->id;

        if ($idServicio === "all") {
            $proveedores = DB::table('v_usuarios_proveedores_todo')->select(DB::raw('id, nombreComercial, estrellas, descripcionServicio, logotipo, calificacion'))->where('estatus', '=', 1)->get()->toArray();
        } else {
            $proveedores = DB::table('v_usuarios_proveedores_todo')->select(DB::raw('id, nombreComercial, estrellas, descripcionServicio, logotipo, calificacion'))->where('estatus', '=', 1)->where('idServicio', '=', $idServicio)->get()->toArray();
        }

        $totalRegistros = count($proveedores);

        return response()->json(["proveedores" => $proveedores, "total" => $totalRegistros]);
    }

    public function verProveedor($idUsuario)
    {

        $comentarios = DB::table('v_comentarios_a_proveedores')->select('*')->where('idProveedor', '=', $idUsuario)->get();
        $proveedores = DB::table('v_usuarios_proveedores_todo')->select('*')->where('id', '=', $idUsuario)->get();
        return view('cliente.ver_individual', ["proveedores" => $proveedores, "comentarios" => $comentarios]);
    }
}
