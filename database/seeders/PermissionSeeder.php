<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'list products',
            'edit products',
            'show products',
            'create products',
            'delete products',
            'update products',

            'list categories',
            'edit categories',
            'show categories',
            'create categories',
            'delete categories',
            'update categories',
            
            // Sizes permissions
            'list sizes',
            'edit sizes',
            'show sizes',
            'create sizes',
            'delete sizes',
            'update sizes',
            
            // Colors permissions
            'list colors',
            'edit colors',
            'show colors',
            'create colors',
            'delete colors',
            'update colors',

            'list users',
            'edit users',
            'update users',

            'list roles',
            'edit roles',
            'update roles',
        ];

        foreach ($permissions as $permission) {
            if (!Permission::where('name', $permission)->exists()) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
