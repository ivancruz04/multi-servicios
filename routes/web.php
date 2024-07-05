<?php

use Illuminate\Support\Facades\Route;


Route::get('/asignar', [App\Http\Controllers\AsignarRol::class, 'asignar'])->name('asignar');


Route::get('/Qwikly/inicio', [App\Http\Controllers\BienvenidosController::class, 'indexBienvenidos'])->name('Qwikly/inicio');

Route::get('/seleccion', [App\Http\Controllers\BienvenidosController::class, 'seleccionUsuario'])->name('seleccion');

Route::get('/registro/proveedor', [App\Http\Controllers\BienvenidosController::class, 'preRegistroProveedores'])->name('registro/proveedor');
Route::post('/preRegistroProveedor', [App\Http\Controllers\BienvenidosController::class, 'preGuardarProveedor'])->name('preRegistroProveedor');
Route::get('/solicitudEnviada/proveedor', [App\Http\Controllers\BienvenidosController::class, 'solicitudEnviadaProveedor'])->name('solicitudEnviada/proveedor');

Route::get('/registro/cliente', [App\Http\Controllers\BienvenidosController::class, 'preRegistroCliente'])->name('registro/cliente');
Route::post('/preRegistroCliente', [App\Http\Controllers\BienvenidosController::class, 'preGuardarCliente'])->name('preRegistroCliente');
Route::get('/solicitudEnviada/cliente', [App\Http\Controllers\BienvenidosController::class, 'solicitudEnviadaCliente'])->name('solicitudEnviada/cliente');



Route::get('/login', [App\Http\Controllers\LoginController::class, 'indexLogin'])->name('login');
Route::post('/validar', [App\Http\Controllers\LoginController::class, 'login'])->name('validar');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');



Route::group(['middleware' => ['auth']], function () {
//--------------RUTAS ADMINISTRADOR----------------------------
    //INDEX
    Route::get('/', [App\Http\Controllers\AdminIndexController::class, 'index'])->name('');
    Route::get('/inicio', [App\Http\Controllers\AdminIndexController::class, 'index'])->name('inicio');
    //CATALOGOS
    Route::get('/admin/catalogos', [App\Http\Controllers\AdminCatalogosController::class, 'indexCatalogos'])->name('admin/catalogos');
    //USUARIOS
    Route::get('/admin/usuarios/administradores', [App\Http\Controllers\AdminUsuariosController::class, 'indexAdministradores'])->name('admin/usuarios/administradores');
    Route::get('/admin/usuarios/proveedores', [App\Http\Controllers\AdminUsuariosController::class, 'indexProveedores'])->name('admin/usuarios/proveedores');
    Route::get('/admin/usuarios/nuevoProveedor', [App\Http\Controllers\AdminUsuariosController::class, 'indexnuevoProveedores'])->name('admin/usuarios/nuevoProveedor');
    Route::post('/admin/usuarios/registrarProveedor', [App\Http\Controllers\AdminUsuariosController::class, 'registrarProveedores'])->name('admin/usuarios/registrarProveedor');
    Route::get('admin/proveedor/{idUsuario}', [App\Http\Controllers\AdminUsuariosController::class, 'verProveedor'])->name('admin/proveedor');
    Route::post('/admin/notificacion/proveedor', [App\Http\Controllers\AdminUsuariosController::class, 'enviarNotificacionProveedor'])->name('notificacion/proveedor');
    Route::post('/admin/activar/proveedor', [App\Http\Controllers\AdminUsuariosController::class, 'activarProveedor'])->name('activar/proveedor');
    Route::post('/admin/suspender/proveedor', [App\Http\Controllers\AdminUsuariosController::class, 'suspenderProveedor'])->name('suspender/proveedor');

    Route::get('/admin/usuarios/clientes', [App\Http\Controllers\AdminUsuariosController::class, 'indexClientes'])->name('admin/usuarios/clientes');
    Route::get('/admin/usuarios/nuevoCliente', [App\Http\Controllers\AdminUsuariosController::class, 'indexnuevoCliente'])->name('admin/usuarios/nuevoCliente');
    Route::post('/admin/usuarios/registrarCliente', [App\Http\Controllers\AdminUsuariosController::class, 'registrarCliente'])->name('admin/usuarios/registrarCliente');
    Route::get('admin/cliente/{idUsuario}', [App\Http\Controllers\AdminUsuariosController::class, 'verCliente'])->name('admin/cliente');
    Route::post('/admin/notificacion/cliente', [App\Http\Controllers\AdminUsuariosController::class, 'enviarNotificacionCliente'])->name('notificacion/cliente');
    Route::post('/admin/activar/cliente', [App\Http\Controllers\AdminUsuariosController::class, 'activarCliente'])->name('activar/cliente');
    Route::post('/admin/suspender/cliente', [App\Http\Controllers\AdminUsuariosController::class, 'suspenderCliente'])->name('suspender/cliente');
    //SOLICITUDES
    Route::get('/admin/solicitudes/proveedores', [App\Http\Controllers\AdminSolicitudes::class, 'indexSolicitudesProveedores'])->name('admin/solicitudes/proveedores');
    Route::get('admin/verSolicitud/proveedor/{idUsuario}', [App\Http\Controllers\AdminSolicitudes::class, 'verSolicitudProveedor'])->name('verSolicitud/proveedor');
    Route::post('/admin/aceptarSolicitud/proveedor', [App\Http\Controllers\AdminSolicitudes::class, 'aceptarSolicitudProveedor'])->name('aceptarSolicitud/proveedor');
    Route::post('/admin/rechazarSolicitud/proveedor', [App\Http\Controllers\AdminSolicitudes::class, 'rechazarSolicitudProveedor'])->name('rechazarSolicitud/proveedor');
    
    Route::get('/admin/solicitudes/clientes', [App\Http\Controllers\AdminSolicitudes::class, 'indexSolicitudesClientes'])->name('admin/solicitudes/clientes');
    Route::get('admin/verSolicitud/cliente/{idUsuario}', [App\Http\Controllers\AdminSolicitudes::class, 'verSolicitudCliente'])->name('verSolicitud/cliente');

// --------------RUTAS PROVEEDORES-------------------------------

    //INDEX
    Route::get('/proveedor/inicio', [App\Http\Controllers\ProvIndexController::class, 'index'])->name('proveedor/inicio');
    Route::get('/proveedor/cotizaciones', [App\Http\Controllers\CotizacionController::class, 'indexCotizacionesProveedor'])->name('proveedor/cotizaciones');
    Route::get('proveedor/ver/cotizacion/{idCotizacion}', [App\Http\Controllers\CotizacionController::class, 'verCotizacionProveedor'])->name('ver/cotizacion/proveedor');
    Route::get('proveedor/responder/cotizacion/{idCotizacion}', [App\Http\Controllers\CotizacionController::class, 'responderCotizacionProveedor'])->name('responder/cotizacion/proveedor');
    Route::post('/proveedor/responder/cotizacion', [App\Http\Controllers\CotizacionController::class, 'enviarRespuestaCotizacionProveedor'])->name('proveedor/responder/cotizacion');

// -------------RUTAS CLIENTES-----------------------------------
//     //INDEX
    Route::get('/cliente/inicio', [App\Http\Controllers\ClienteIndexController::class, 'index'])->name('cliente/inicio');
    
    Route::get('/cliente/proveedores', [App\Http\Controllers\ClienteProveedoresController::class, 'indexVerProveedores'])->name('cliente/proveedores');
    Route::post('/cliente/buscar', [App\Http\Controllers\ClienteProveedoresController::class, 'buscarProveedores'])->name('cliente/buscar');
    Route::get('cliente/ver/proveedor/{idUsuario}', [App\Http\Controllers\ClienteProveedoresController::class, 'verProveedor'])->name('ver/proveedor');


    //COTIZACIONES
    Route::get('/cliente/cotizaciones', [App\Http\Controllers\CotizacionController::class, 'indexCotizaciones'])->name('cliente/cotizaciones');
    Route::post('/regitrar/cotizacion', [App\Http\Controllers\CotizacionController::class, 'registrarCotizacion'])->name('cliente/buscar');
    Route::get('cliente/ver/cotizacion/{idCotizacion}', [App\Http\Controllers\CotizacionController::class, 'verCotizacion'])->name('ver/cotizacion');
    
    //estas rutas se reciclan para clientes y proveedores
    Route::post('/cotizacion/enservicio', [App\Http\Controllers\CotizacionController::class, 'cotizacionEnServicio'])->name('cotizacion/enservicio');
    Route::post('/cotizacion/terminada', [App\Http\Controllers\CotizacionController::class, 'trabajoTerminado'])->name('cotizacion/terminada');
    Route::post('/cotizacion/cancelada', [App\Http\Controllers\CotizacionController::class, 'cotizacionCancelada'])->name('cotizacion/cancelada');

    Route::get('/cliente/informacion', [App\Http\Controllers\ClienteInformacionController::class, 'indexClienteInformacion'])->name('cliente/informacion');

});
