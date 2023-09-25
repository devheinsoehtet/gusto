<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            ['name' => 'create_car', 'name_alias' => 'Create Car'],
            ['name' => 'show_car', 'name_alias' => 'View Car Details'],
            ['name' => 'list_car', 'name_alias' => 'View Car List'],
            ['name' => 'delete_car', 'name_alias' => 'Delete Car']
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission['name']],
                ['name' => $permission['name'], 'name_alias' => $permission['name_alias']]
            );
        }

        $permissionNames = array_column($permissions, 'name');
        Permission::whereNotIn('name', $permissionNames)->delete();
    }
}
