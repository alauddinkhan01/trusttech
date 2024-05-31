<?php

namespace Database\Seeders;

use App\Enum\RolesEnum;
use App\Enum\PermissionsEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsByRole = [
            RolesEnum::ADMIN->value => [
                // admin module permissions
                PermissionsEnum::VIEW_USERS,
                PermissionsEnum::CREATE_POST,
                PermissionsEnum::UPDATE_POST,
                PermissionsEnum::VIEW_POST,
                PermissionsEnum::DELETE_POST,
                PermissionsEnum::VIEW_DASHBOARD,
            ],
            RolesEnum::USER->value => [
                // user module permissions
                PermissionsEnum::CREATE_POST,
                PermissionsEnum::UPDATE_POST,
                PermissionsEnum::VIEW_POST,
                PermissionsEnum::DELETE_POST,
            ],
        ];

        foreach ($permissionsByRole as $role => $permissions) {
            // Create role if it doesn't exist
            $roleModel = Role::firstOrCreate(['name' => $role]);

            foreach ($permissions as $permission) {
                // Check if the permission already exists
                $permissionModel = Permission::where('name', $permission->value)->first();

                if (!$permissionModel) {
                    // Create the permission if it doesn't exist
                    $permissionModel = Permission::create([
                        'name' => $permission->value,
                        'guard_name' => 'web',
                    ]);
                }

                // Attach the permission to the role
                $roleModel->givePermissionTo($permissionModel);
            }
        }

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
