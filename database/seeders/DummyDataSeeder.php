<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DummyData;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DummyData::factory()->count(120)->create();
    }
}
