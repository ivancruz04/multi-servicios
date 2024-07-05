<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\NuevoProveedor;
use App\Mail\NotificacionProveedor;


class AdminUsuariosController extends Controller
{
//funciones para administradores    
    public function indexAdministradores(){
        return view('administrador.index_usuarios_admin');
    }

//functiones para proveedores

    public function indexProveedores(){

        $proveedores = DB::table('v_usuarios_proveedores_todo')->select(DB::raw('id ,name, email, nombreServicio, rfc, telefono, calificacion, estatus, estrellas'))->orderByDesc('estatus')->get();
        return view('administrador.index_usuarios_prov', ["proveedores" => $proveedores]);
    }

    public function indexnuevoProveedores(){
        $servicios = DB::table('servicios')->select('*')->get();
        return view('administrador.nuevo_proveedor', ["servicios" => $servicios]);
    }

    public function verProveedor($idUsuario){

        $datos = DB::table('v_usuarios_proveedores_todo')->select('*')->where('id', '=', $idUsuario)->get();
        return view('administrador.ver_proveedor', ["datos" => $datos]);
    }

    public function registrarProveedores (Request $request){

        //codigo para definir el logotipo
        if ($request->hasFile('logotipo')) {
            $prefijo = Str::random(7);
            $logo = $request->file('logotipo');
            $extension = $logo->getClientOriginalExtension(); // Obtener la extensión original de la imagen
            $nombreArchivo = $prefijo . '_' . time() . '.' . $extension; // Nuevo nombre de archivo único
            $logo->move(public_path('logosProveedores'), $nombreArchivo); // Mover la imagen con el nuevo nombre
            $logotipoPath = "logosProveedores/" . $nombreArchivo;
        } else {
            $logotipoPath = " ";
        }
        try {

            $user = new User();

            $user->name = $request->nombre;
            $user->email = $request->correo;
            $user->password = Hash::make($request->contrasena);
            $user->rol = 2;
            $user->preRegistro = 0;
            $user->estatus = 1;
            $user->assignRole('proveedor');
            $user->save();

            $userId = $user->id;

            $proveedor = new Proveedor();
            $proveedor->idUsuario = $userId;
            $proveedor->nombreProveedor = $request->nombre;
            $proveedor->idServicio = $request->servicio;
            $proveedor->descripcion = $request->descripcion;
            $proveedor->telefono = $request->telefono;
            $proveedor->logotipo = $logotipoPath;
            $proveedor->rfc = $request->rfc;
            $proveedor->razonSocial = $request->razonSocial;
            $proveedor->nombreComercial = $request->nombreComercial;
            $proveedor->paginaWeb = $request->paginaWeb;
            $proveedor->facebook = $request->facebook;
            $proveedor->calle = $request->calle;
            $proveedor->numeroExterior = $request->numeroExt;
            $proveedor->colonia = $request->colonia;
            $proveedor->cp = $request->cp;
            $proveedor->estado = $request->estado;
            $proveedor->ciudad = $request->ciudad;
            $proveedor->calificacion = 0;
            $proveedor->estrellas = 0;
            $proveedor->trabajos = 0;
            $proveedor->save();
            
            Mail::to($request->correo)->send((new NuevoProveedor($request->nombre, $request->correo, $request->contrasena)));
        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => $th->getMessage()]);
        }

        return response()->json(["respuesta" => 1, "mensaje" => "Registrado con exito"]);

    }

    public function enviarNotificacionProveedor(Request $request){

        try {

            Mail::to($request->correo)->send((new NotificacionProveedor($request->nombre,$request->correo,  $request->mensaje)));

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error al enviar"]);
        }

        return response()->json(["respuesta" => 1, "mensaje" => "Notificación enviada"]);

    }

    public function activarProveedor(Request $request){
        $idUsuario = $request->idUsuario;

        try {

            $activarProveedor = DB::table('users')
            ->where('id', '=', $idUsuario)
            ->update(['estatus' => 1]);

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error al activar"]);
        }

        if($activarProveedor){
            return response()->json(["respuesta" => 1, "mensaje" => "Proveedor activado"]);
        }
    }

    public function suspenderProveedor(Request $request){

        $idUsuario = $request->idUsuario;

        try {

            $suspenderProveedor = DB::table('users')
            ->where('id', '=', $idUsuario)
            ->update(['estatus' => 0]);

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error al suspender"]);
        }

        if($suspenderProveedor){
            return response()->json(["respuesta" => 1, "mensaje" => "Proveedor suspendido"]);
        }

    }





    //funciones para clientes

    public function indexClientes(){
        $clientes = DB::table('v_usuarios_clientes_todo')->select(DB::raw('id ,name, email, rfc, telefono, estatus'))->orderByDesc('estatus')->get();

        return view('administrador.index_usuarios_clientes', ["clientes" => $clientes]);
    }

    public function indexnuevoCliente(){
        return view('administrador.nuevo_cliente');
    }

    public function verCliente($idUsuario){

        $datos = DB::table('v_usuarios_clientes_todo')->select('*')->where('id', '=', $idUsuario)->get();
        return view('administrador.ver_cliente', ["datos" => $datos]);
    }

    public function registrarCliente (Request $request){

        try {

            $user = new User();

            $user->name = $request->nombre;
            $user->email = $request->correo;
            $user->password = Hash::make($request->contrasena);
            $user->rol = 3;
            $user->preRegistro = 0;
            $user->estatus = 1;
            $user->assignRole('cliente');

            $user->save();

            $userId = $user->id;

            $cliente = new Cliente();
            $cliente->idUsuario = $userId;
            $cliente->nombreCliente = $request->nombre;
            $cliente->telefono = $request->telefono;
            $cliente->rfc = $request->rfc;
            $cliente->calle = $request->calle;
            $cliente->numeroExterior = $request->numeroExt;
            $cliente->colonia = $request->colonia;
            $cliente->cp = $request->cp;
            $cliente->estado = $request->estado;
            $cliente->ciudad = $request->ciudad;

            $cliente->save();
        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error - Solicitud no enviada"]);
        }

        if($user->save() && $cliente->save()){
            //el envio de correo es reciclado de la funcion para un proveedor
            Mail::to($request->correo)->send((new NuevoProveedor($request->nombre, $request->correo, $request->contrasena)));
            return response()->json(["respuesta" => 1, "mensaje" => "Registrado con exito"]);
        }

    }

    public function enviarNotificacionCliente(Request $request){

        try {

            //funcion de notificacion de correo reciclada de proveedores
            Mail::to($request->correo)->send((new NotificacionProveedor($request->nombre,$request->correo,  $request->mensaje)));

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error al enviar notificación"]);
        }

        return response()->json(["respuesta" => 1, "mensaje" => "Notificación enviada"]);

    }

    public function activarCliente(Request $request){
        $idUsuario = $request->idUsuario;

        try {

            $activarCliente = DB::table('users')
            ->where('id', '=', $idUsuario)
            ->update(['estatus' => 1]);

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error al activar"]);
        }

        if($activarCliente){
            return response()->json(["respuesta" => 1, "mensaje" => "Cliente activado"]);
        }
    }

    public function suspenderCliente(Request $request){

        $idUsuario = $request->idUsuario;

        try {

            $suspenderCliente = DB::table('users')
            ->where('id', '=', $idUsuario)
            ->update(['estatus' => 0]);

        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => "Error al suspender"]);
        }

        if($suspenderCliente){
            return response()->json(["respuesta" => 1, "mensaje" => "Cliente suspendido"]);
        }

    }
}
