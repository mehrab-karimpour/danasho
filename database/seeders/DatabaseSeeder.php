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
            bookSeeder::class,
            fieldSeeder::class,
            gradeSeeder::class,
            stateSeeder::class,
            unitSeeder::class,
            lessonSeeder::class,
            publicSeeder::class,
            permissionSeeder::class,
            userSeeder::class,
            creditItemSeeder::class,
            universitiesSeeder::class,
            filedUniversitiesSeeder::class
        ]);
    }
}
