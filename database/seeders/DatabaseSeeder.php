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
//        $this->call(UserSeeder::class);
        $this->call(ScientificActivityItemSeeder::class);
    }
}
