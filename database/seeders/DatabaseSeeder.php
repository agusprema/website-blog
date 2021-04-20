<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\DummyDataSeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\MenuSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolePermissionSeeder::class,
            DummyDataSeeder::class,
            MenuSeeder::class
        ]);
    }
}
