<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Proveedor;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BienvenidosController extends Controller
{
    public function indexBienvenidos()
    {
        return view('portal');
    }

    public function preRegistroProveedores()
    {

        $servicios = DB::table('servicios')->select('*')->get();
        return view('preRegistroProv', ["servicios" => $servicios]);
    }

    public function preRegistroCliente()
    {

        return view('preRegistroCliente');
    }

    public function seleccionUsuario()
    {

        return view('seleccion');
    }

    public function preGuardarProveedor(Request $request)
    {

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
            $user->preRegistro = 1;
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
        } catch (\Throwable $th) {
            return response()->json(["respuesta" => 2, "mensaje" => $th->getMessage()]);
        }

        return response()->json(["respuesta" => 1, "mensaje" => "Registrado con exito"]);
    }

    public function solicitudEnviadaProveedor()
    {
        return view('confirmacionProveedor');
    }

    public function preGuardarCliente(Request $request)
    {
        try {

            $user = new User();

            $user->name = $request->nombre;
            $user->email = $request->correo;
            $user->password = Hash::make($request->contrasena);
            $user->rol = 3;
            $user->preRegistro = 0;
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

        return response()->json(["respuesta" => 1, "mensaje" => "Registrado con exito"]);
    }
    
    public function solicitudEnviadaCliente()
    {
        return view('confirmacionCliente');
    }
}
