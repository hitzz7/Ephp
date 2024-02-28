<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $managerRole = Role::create(['name' => 'manager']);
        $userRole = Role::create(['name' => 'user']);

        // Define permissions (assuming you have Permission model and permissions defined)
        $permissions = Permission::pluck('id','id')->all();
        

        // Assign permissions to roles
        $adminRole->syncPermissions($permissions);
        $managerRole->syncPermissions($permissions);
        // Manager role may have some restricted permissions specific to their role, so adjust as needed
        // Example: $managerRole->syncPermissions($restrictedPermissions);

        // For the user role, you may want to assign only basic permissions
        // Example: $basicPermissions = Permission::where('name', 'LIKE', 'basic.%')->pluck('id');
        // $userRole->syncPermissions($basicPermissions);
    }
}
