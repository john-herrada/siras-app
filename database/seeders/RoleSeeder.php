<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //CREAR ROLES
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Estandar']);
        $role3 = Role::create(['name' => 'Temporal']);
        $role4 = Role::create(['name' => 'Desarrollador']);

        //CREAR PERMISOS
        Permission::create(['name' => 'createuser'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'edituser'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'removeuser'])->syncRoles([$role1,$role4]);
        Permission::create(['name' => 'viewdeveloper'])->syncRoles([$role4]);
        Permission::create(['name' => 'createcinta'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'tablecinta'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'actionscinta'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'downloadreports'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'viewdashboard'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'viewcintas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'viewprestamos'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'viewentregas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'viewusers'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'viewsite'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'viewred'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'viewreports'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'viewtickets'])->syncRoles([$role1, $role2, $role4]);
    }
}
