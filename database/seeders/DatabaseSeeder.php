<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return vo"id"
     */
    public function run()
    {
        $this->call(TagSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectSeeder::class);
    }
}
