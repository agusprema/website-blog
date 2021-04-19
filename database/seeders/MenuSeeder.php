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
        Menu::created([
            'menu_name' => 'Dashboard Management',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-tachometer-alt',
            'menu_url' => Null,
            'parent_id' => 0,
            'menu_permission' => 'Dashboard Management|Menu Management',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'Menu Management',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-layer-group',
            'menu_url' => 'admin/menu-management',
            'parent_id' => 1,
            'menu_permission' => 'Menu Management',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'Log Activity',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-history',
            'menu_url' => 'admin/log-website',
            'parent_id' => 0,
            'menu_permission' => 'Log Management',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'Users Management',
            'menu_type' => 'dropdown',
            'menu_icon' => 'fas fa-users',
            'menu_url' => Null,
            'parent_id' => 0,
            'menu_permission' => 'Users Management',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'User Management',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-users',
            'menu_url' => 'admin/users-management',
            'parent_id' => 4,
            'menu_permission' => 'User Management',
            'menu_active' => 1,
        ]);
        Menu::create([
            'menu_name' => 'Role & Permission Management',
            'menu_type' => 'basic',
            'menu_icon' => 'fas fa-user-tag',
            'menu_url' => 'admin/role-website',
            'parent_id' => 4,
            'menu_permission' => 'Role and Permission Management',
            'menu_active' => 1,
        ]);
    }
}
