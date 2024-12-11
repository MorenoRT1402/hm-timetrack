<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    // Define constants for roles
    private const ROLE_ADMIN = 'admin';
    private const ROLE_EMPLOYEE = 'employee';

    // Define constants for permissions
    private const PERMISSION_CREATE_ENTRIES = 'create_entries';
    private const PERMISSION_EDIT_ENTRIES = 'edit_entries';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Roles
        $admin = Role::create(['name' => self::ROLE_ADMIN]);
        $employee = Role::create(['name' => self::ROLE_EMPLOYEE]);

        // Create Permissions
        $permissions = [
            self::PERMISSION_CREATE_ENTRIES,
            self::PERMISSION_EDIT_ENTRIES,
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assign Permissions to Roles
        $admin->givePermissionTo($permissions);
        $employee->givePermissionTo([self::PERMISSION_CREATE_ENTRIES]);
    }
}
