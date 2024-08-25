<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'edit items']);
        Permission::create(['name' => 'delete items']);
        Permission::create(['name' => 'publish items']);
        Permission::create(['name' => 'unpublish items']);

        // Create roles and assign existing permissions
        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('edit items');

        $role = Role::create(['name' => 'moderator']);
        $role ->givePermissionTo(['edit items', 'delete items']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
    }
}
