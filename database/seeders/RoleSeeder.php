<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        Permission::create(['name' => 'manage events']);  // Admin permission
        Permission::create(['name' => 'register events']);  // User permission

        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        // Assign permissions to roles
        $adminRole->givePermissionTo('manage events');
        $userRole->givePermissionTo('register events');
    }
}
