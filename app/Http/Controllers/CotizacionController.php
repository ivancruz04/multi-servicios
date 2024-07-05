<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Cotizaciones;



class CotizacionController extends Controller
{
    public function indexCotizaciones()
    {

        $cliente = Auth::user()->id;
        $cotizaciones = DB::table('v_cotizaciones_todo')->select(DB::raw('id, nombreCotizacion, fecha, idEstatus, descripcionEstatus, nombreProveedor'))
            ->where('idCliente', '=', $cliente)->get();
        return view('cliente.cotizaciones', ["cotizaciones" => $cotizaciones]);
    }

    public function registrarCotizacion(Request $request)
    {

        try {
            $cotizacion = new Cotizacion();

            $cliente = Auth::user()->id;

            $cotizacion->nombreCotizacion       = $request->nombreCotizacion;
            $cotizacion->descripcion            = $request->descripcion;
            $cotizacion->fecha                  = $request->fecha;
            $cotizacion->direccion              = $request->direccion;
            $cotizacion->comentariosAdicionales = $request->comentariosAdicionales;
            $cotizacion->idProveedor            = $request->idProveedor;
            $cotizacion->nombreCliente          = $request->nombreCliente;
            $cotizacion->correoCliente          = $request->correoCliente;
            $cotizacion->telefonoCliente        = $request->telefonoCliente;
            $cotizacion->idEstatus              = 1;
            $cotizacion->idCliente              = $cliente;


            $cotizacion->save();
        } catch (\Throwable $th) {
            return response()->json(
                ["respuesta" => 2, "mensaje" => "Error al enviar"]
            );
        }

        if ($cotizacion->save()) {

            try {
                Mail::to($request->emailProveedor)->send((new Cotizaciones($request->nombreCotizacion, $request->fecha, $request->nombreComercial, $request->emailProveedor)));
            } catch (\Throwable $th) {
                return response()->json(
                    ["respuesta" => 2, "mensaje" => "Error al notificar"]
                );
            }
            return response()->json(
                ["respuesta" => 1, "mensaje" => "Enviada correctamente"]
            );
        }
    }

    public function verCotizacion($idCotizacion)
    {
        $cotizaciones = DB::table('v_cotizaciones_todo')->select('*')->where('id', '=', $idCotizacion)->get();
        return view('cliente.ver_cotizacion', ["cotizaciones" => $cotizaciones]);
    }

    public function cotizacionCancelada(Request $request)
    {

        $idCotizacion = $request->id;
        try {
            $cancelarCotizacion = DB::table('cotizaciones')
                ->where('id', '=', $idCotizacion)
                ->update(['idEstatus' => 4]);
        } catch (\Throwable $th) {
            return response()->json(
                ["respuesta" => 2, "mensaje" => "Error al cerrar"]
            );
        }

        if ($cancelarCotizacion) {
            return response()->json(
                ["respuesta" => 1, "mensaje" => "Cerrada"]
            );
        }
    }

    public function cotizacionEnServicio(Request $request)
    {
        $idCotizacion = $request->id;
        try {
            $cotizacionEnServicio = DB::table('cotizaciones')
                ->where('id', '=', $idCotizacion)
                ->update(['idEstatus' => 2]);
        } catch (\Throwable $th) {
            return response()->json(
                ["respuesta" => 2, "mensaje" => "Error al cambiar de estatus"]
            );
        }

        if ($cotizacionEnServicio) {
            return response()->json(
                ["respuesta" => 1, "mensaje" => "Servicio Iniciado"]
            );
        }
    }

    public function trabajoTerminado(Request $request)
    {
        $idCotizacion = $request->id;
        $numeroComentarios = $request->hay;

        if ($numeroComentarios == 0) {
            //terminado pero sin comentarios ni calificacion
            try {
                $trabajoTerminado = DB::table('cotizaciones')
                    ->where('id', '=', $idCotizacion)
                    ->update(['idEstatus' => 3]);
            } catch (\Throwable $th) {
                return response()->json(
                    ["respuesta" => 2, "mensaje" => "Error al cambiar de estatus"]
                );
            }
        } else {
            //terminado con comentarios y calificacion

            try {
                $trabajoTerminado = DB::table('cotizaciones')
                    ->where('id', '=', $idCotizacion)
                    ->update(['idEstatus' => 3]);

                //insercion de comentarios
                $datos = [
                    'idProveedor' => $request->idProveedor,
                    'idCliente' => $request->idCliente,
                    'comentario' => $request->comentario
                ];

                //registro de comentarios
                $registro_comentarios = DB::table('proveedores_comentarios')->insert($datos);

                $estrellas_trabajos = DB::table('proveedores')->select(DB::raw('estrellas, trabajos'))->where('idUsuario', '=', $request->idProveedor)->get();

                foreach ($estrellas_trabajos as  $datos) {
                    $estrellas = $datos->estrellas;
                    $trabajos = $datos->trabajos;
                }
                $nuevoTrabajos = $trabajos + 1;
                $sumaEstrellas = $estrellas + $request->estrellas;
                $calificacion = round($sumaEstrellas / $nuevoTrabajos);



                $datosProveedor = DB::table('proveedores')
                    ->where('idUsuario', '=', $request->idProveedor)
                    ->update([
                        'calificacion' => $calificacion,
                        'estrellas' => $sumaEstrellas,
                        'trabajos' => $nuevoTrabajos
                    ]);
            } catch (\Throwable $th) {
                return response()->json(
                    ["respuesta" => 2, "mensaje" => $th->getMessage()]
                );
            }
        }

        if ($trabajoTerminado && $registro_comentarios && $datosProveedor) {
            return response()->json(
                ["respuesta" => 1, "mensaje" => "Servicio Terminado"]
            );
        }
    }

    public function indexCotizacionesProveedor()
    {
        $proveedor = Auth::user()->id;
        $cotizaciones = DB::table('v_cotizaciones_todo')->select(DB::raw('id, nombreCotizacion, fecha, idEstatus, descripcionEstatus, nombreCliente'))
            ->where('idProveedor', '=', $proveedor)->get();
        return view('proveedor.cotizaciones', ["cotizaciones" => $cotizaciones]);
    }

    public function verCotizacionProveedor($idCotizacion)
    {
        $cotizaciones = DB::table('v_cotizaciones_todo')->select('*')->where('id', '=', $idCotizacion)->get();
        return view('proveedor.ver_cotizacion', ["cotizaciones" => $cotizaciones]);
    }

    public function responderCotizacionProveedor($idCotizacion)
    {
        $cotizaciones = DB::table('v_cotizaciones_todo')->select('*')->where('id', '=', $idCotizacion)->get();
        return view('proveedor.responder_cotizacion', ["cotizaciones" => $cotizaciones]);
    }

    public function enviarRespuestaCotizacionProveedor(Request $request)
    {
        
            $idCotizacion = $request->id;
            try {
                $enviarRespuesta = DB::table('cotizaciones')
                    ->where('id', '=', $idCotizacion)
                    ->update(['idEstatus' => 5, "respuesta" => $request->respuesta]);
            } catch (\Throwable $th) {
                return response()->json(
                    ["respuesta" => 2, "mensaje" => "Error al responder"]
                );
            }
            if ($enviarRespuesta) {
                return response()->json(
                    ["respuesta" => 1, "mensaje" => "Respuesta enviada"]
                );
            }
    }
}
