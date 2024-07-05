<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\RechazoSolicitudProveedor;
use App\Mail\AceptacionSolicitudProveedor;
use App\Models\Proveedor;
use App\Models\User;


class AdminSolicitudes extends Controller
{
    public function indexSolicitudesProveedores(){

        $solicitudes = DB::table('v_solicitud_proveedores')->select(DB::raw('id ,name, email, nombreServicio, rfc, telefono'))->get();
        return view ('administrador.index_solicitudes_prov', ["solicitudes" => $solicitudes]);
    }

    public function indexSolicitudesClientes(){
        return view ('administrador.index_solicitudes_clientes');
    }

    public function verSolicitudProveedor($idUsuario){

        $datos = DB::table('v_solicitud_proveedores')->select('*')->where('id', '=', $idUsuario)->get();
        return view('administrador.ver_solicitud_proveedor', ["datos" => $datos]);
    }

    public function aceptarSolicitudProveedor (Request $request){

        $idUsuario = $request->idUsuario;
        $nombre = $request->name;
        $correo = $request->email;

        try {
            Mail::to($correo)->send((new AceptacionSolicitudProveedor($nombre, $correo)));

            $aceptarSolicitud = DB::table('users')
            ->where('id', '=', $idUsuario)
            ->update(['preRegistro' => 0,
                      'estatus' => 1]);

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => $th->getMessage()]);
        }

        if($aceptarSolicitud){
            return response()->json(["respuesta" => 1, "mensaje" => "Solicitud aceptada"]);
        }
    }

    public function rechazarSolicitudProveedor (Request $request){

        $idProveedor = $request->idUsuario;
        $nombre = $request->name;
        $correo = $request->email;
        $motivo = $request->motivo;

        try {
            Mail::to($correo)->send((new RechazoSolicitudProveedor($nombre, $correo, $motivo)));

            $proveedor = Proveedor::find($idProveedor);
            $proveedor->delete();

            $usuario = User::find($idProveedor);
            $usuario -> delete();

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => $th->getMessage()]);
        }
        
        return response()->json(["respuesta" => 1, "mensaje" => "solicitud rechazada"]);
        
    }
}
