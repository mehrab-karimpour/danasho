<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            scoreSeeder::class,
            stateSeeder::class,
            classSeeder::class,
            permissionSeeder::class,
            userSeeder::class,
            creditItemSeeder::class,
            universitiesSeeder::class,
            filedUniversitiesSeeder::class
        ]);
    }
}
