<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $role = Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'vendor']);
        Role::create(['name' => 'buyer']);
        Role::create(['name' => 'webmaster']);

        // create permissions
        $permission = [
            Permission::create(['name' => 'create new user']),
            Permission::create(['name' => 'edit user']),
            Permission::create(['name' => 'assign role']),
            Permission::create(['name' => 'edit price']),
            Permission::create(['name' => 'edit limit']),
            Permission::create(['name' => 'add API address']),
            Permission::create(['name' => 'block user'])
        ];

        // create roles and assign created permissions
        $role->givePermissionTo($permission);
    }
}
