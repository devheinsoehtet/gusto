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
            ['name' => 'list_car', 'name_alias' => 'View Car List'],
            ['name' => 'show_car', 'name_alias' => 'View Car Details'],
            ['name' => 'create_car', 'name_alias' => 'Create Car'],
            ['name' => 'edit_car', 'name_alias' => 'Edit Car'],
            ['name' => 'delete_car', 'name_alias' => 'Delete Car'],

            ['name' => 'list_booking', 'name_alias' => 'View Booking List'],
            ['name' => 'show_booking', 'name_alias' => 'View Booking Details'],
            ['name' => 'create_booking', 'name_alias' => 'Create Booking'],
            ['name' => 'edit_booking', 'name_alias' => 'Edit Booking'],
            ['name' => 'delete_booking', 'name_alias' => 'Delete Booking']
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
