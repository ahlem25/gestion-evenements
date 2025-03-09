<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
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

        // Create an Admin account
        $user = User::create([
            'name' => 'Ahlem Cherni',
            'email' => 'ahlem.cherni112@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        // Assign roles to admin
        $user->assignRole($adminRole);

        // You can create another user and assign a different role
        $user2 = User::create([
            'name' => 'Ahlem Cherni',
            'email' => 'ahlem.cherni113@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        // Assign user role
        $user2->assignRole($userRole);

    }
}
