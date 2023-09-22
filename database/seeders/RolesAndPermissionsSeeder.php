<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rolAdmin = Role::create(['name' => 'administrador']);
        $rolProveedor = Role::create(['name' => 'proveedor']);
        $rolCliente = Role::create(['name' => 'cliente']);


        $vistasAdmin = Permission::create(['name' => 'vistasAdmin']);
        $vistasProveedor = Permission::create(['name' => 'vistasProveedor']);
        $vistasCliente = Permission::create(['name' => 'vistasCliente']);
        
        $rolAdmin->givePermissionTo([$vistasAdmin]);
        $rolProveedor->givePermissionTo([$vistasProveedor]);
        $rolCliente->givePermissionTo([$vistasCliente]);
    }
}
