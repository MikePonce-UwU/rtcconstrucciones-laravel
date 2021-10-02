<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'bodega-list',
            'bodega-create',
            'bodega-edit',
            'bodega-delete',
            'proyecto-list',
            'proyecto-create',
            'proyecto-edit',
            'proyecto-delete',
            'entrada-list',
            'entrada-create',
            'entrada-edit',
            'entrada-delete',
            'salida-list',
            'salida-create',
            'salida-edit',
            'salida-delete',
            'alquiler-list',
            'alquiler-create',
            'alquiler-edit',
            'alquiler-delete',
            'producto-list',
            'producto-create',
            'producto-edit',
            'producto-delete',
            'compra-list',
            'compra-create',
            'compra-edit',
            'compra-delete',
            'categoria-list',
            'categoria-create',
            'categoria-edit',
            'categoria-delete',
            'compra-list',
            'compra-create',
            'compra-edit',
            'compra-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
