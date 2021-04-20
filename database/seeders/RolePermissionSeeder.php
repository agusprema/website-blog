<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = User::create([
            'name' => 'agusprema',
            'email' => 'agusprema@gmail.com',
            'password' => '$2y$10$x0sBS74Fs8iJWiEqv2oErOVFfHg9CrlP985AYsuXRGPOpkyFyyQ.W',
            'email_verified_at' => now()
        ]);
        $admin = Role::create(['name' => 'Admin']);
        $user_admin->assignRole('Admin');
        $guest = Role::create(['name' => 'Guest']);
        $writer = Role::create(['name' => 'Writer']);
        $access_all = Permission::create(['name' => 'Access All']);
        $menu_management = Permission::create(['name' => 'Menu Management']);
        $log_management = Permission::create(['name' => 'Log Management']);
        $dashboard_management = Permission::create(['name' => 'Dashboard Management']);
        $role_and_permission_management = Permission::create(['name' => 'Role and Permission Management']);
        $user_management = Permission::create(['name' => 'User Management']);
        $users_management = Permission::create(['name' => 'Users Management']);

        $name_permissions = ['Menu', 'Permission', 'Role'];
        foreach ($name_permissions as $key => $value) {
            foreach (['View', 'Create', 'Update', 'Show', 'Delete', 'Restore', 'Destroy'] as $keyname => $valuename) {
                ${strtolower($valuename) . '_' . strtolower($value)} = Permission::create(['name' => $valuename . ' ' . ucwords(strtolower($value))]);
                $admin->givePermissionTo(${strtolower($valuename) . '_' . strtolower($value)});
                ${strtolower($valuename) . '_' . strtolower($value)}->assignRole($admin);
            }
        }

        $admin->givePermissionTo($access_all);
        $access_all->assignRole($admin);

        $admin->givePermissionTo($menu_management);
        $menu_management->assignRole($admin);

        $admin->givePermissionTo($dashboard_management);
        $dashboard_management->assignRole($admin);

        $admin->givePermissionTo($log_management);
        $log_management->assignRole($admin);

        $admin->givePermissionTo($role_and_permission_management);
        $role_and_permission_management->assignRole($admin);

        $admin->givePermissionTo($user_management);
        $user_management->assignRole($admin);

        $admin->givePermissionTo($users_management);
        $users_management->assignRole($admin);
    }
}
