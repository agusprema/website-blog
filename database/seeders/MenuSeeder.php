<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'menu_name' => 'Dashboard',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-tachometer-alt',
            'menu_url' => 'dashboard',
            'parent_id' => 0,
            'menu_permission' => 'Admin',
            'menu_active' => 1,
            'sort_id' => 1
        ]);
        Menu::create([
            'menu_name' => 'Website',
            'menu_type' => 'group',
            'menu_icon' => 'fas fa-layer-group',
            'menu_url' => Null,
            'parent_id' => 0,
            'menu_permission' => 'Admin',
            'menu_active' => 1,
            'sort_id' => 2
        ]);
        Menu::create([
            'menu_name' => 'Account',
            'menu_type' => 'group',
            'menu_icon' => 'fas fa-users',
            'menu_url' => 'admin/menu-management',
            'parent_id' => 0,
            'menu_permission' => 'Admin',
            'menu_active' => 1,
            'sort_id' => 3
        ]);
        Menu::create([
            'menu_name' => 'Menu',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-layer-group',
            'menu_url' => 'admin/menu-management',
            'parent_id' => 2,
            'menu_permission' => 'Admin',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'Log Activity',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-history',
            'menu_url' => 'admin/log-website',
            'parent_id' => 2,
            'menu_permission' => 'Log Management',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'Users',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-users',
            'menu_url' => 'admin/user-management',
            'parent_id' => 3,
            'menu_permission' => 'Users Management',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'Role & Permission',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-user-tag',
            'menu_url' => 'admin/role-website',
            'parent_id' => 3,
            'menu_permission' => 'Role and Permission Management',
            'menu_active' => 1,
        ]);
    }
}
