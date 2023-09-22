<?php

use Illuminate\Support\Facades\Route;


Route::get('/asignar', [App\Http\Controllers\AsignarRol::class, 'asignar'])->name('asignar');


Route::get('/Qwikly/inicio', [App\Http\Controllers\BienvenidosController::class, 'indexBienvenidos'])->name('Qwikly/inicio');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'indexLogin'])->name('login');
Route::post('/validar', [App\Http\Controllers\LoginController::class, 'login'])->name('validar');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');



// Route::group(['middleware' => ['auth']], function () {
//--------------RUTAS ADMINISTRADOR----------------------------
    //INDEX
    Route::get('/', [App\Http\Controllers\AdminIndexController::class, 'index'])->name('');
    Route::get('/inicio', [App\Http\Controllers\AdminIndexController::class, 'index'])->name('inicio');

    //catalogos
    Route::get('/admin/catalogos', [App\Http\Controllers\AdminCatalogosController::class, 'indexCatalogos'])->name('admin/catalogos');
    

    //USUARIOS
    Route::get('/admin/usuarios/administradores', [App\Http\Controllers\AdminUsuariosController::class, 'indexAdministradores'])->name('admin/usuarios/administradores');
    Route::get('/admin/usuarios/proveedores', [App\Http\Controllers\AdminUsuariosController::class, 'indexProveedores'])->name('admin/usuarios/proveedores');
    Route::get('/admin/usuarios/clientes', [App\Http\Controllers\AdminUsuariosController::class, 'indexClientes'])->name('admin/usuarios/clientes');
    
// //--------------RUTAS PROVEEDORES-------------------------------

    //INDEX
    Route::get('/proveedor/inicio', [App\Http\Controllers\ProvIndexController::class, 'index'])->name('proveedor/inicio');


// //-------------RUTAS CLIENTES-----------------------------------
//     //INDEX
    Route::get('/cliente/inicio', [App\Http\Controllers\ClienteIndexController::class, 'index'])->name('cliente/inicio');
// });
