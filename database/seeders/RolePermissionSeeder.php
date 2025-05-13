<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name'=>'show']);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name'=>'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name'=>'user']);
        $role->givePermissionTo('edit','create','delete');

        $role = Role::create(['name'=>'guest']);
        $role->givePermissionTo('show');
    }
}
