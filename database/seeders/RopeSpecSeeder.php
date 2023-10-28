<?php

namespace Database\Seeders;

use App\Models\RopeSpec;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RopeSpecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RopeSpec::factory(20)->create();

    }
}
