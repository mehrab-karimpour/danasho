<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class gradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            [
                'title' => 'ابتدایی',
                'hasField' => false
            ],
            [
                'title' => 'متوسطه اول',
                'hasField' => false
            ],
            [
                'title' => 'متوسطه دوم',
                'hasField' => true
            ],
        ]);
    }
}
