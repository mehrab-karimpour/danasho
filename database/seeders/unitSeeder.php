<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class unitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            [
                'title' => 'اول ابتدایی',
                'grade_id' => 1,
            ],
            [
                'title' => 'دوم ابتدایی',
                'grade_id' => 1,
            ],
            [
                'title' => 'سوم ابتدایی',
                'grade_id' => 1,
            ],
            [
                'title' => 'چهارم ابتدایی',
                'grade_id' => 1,
            ],
            [
                'title' => 'پنجم ابتدایی',
                'grade_id' => 1,
            ],
            [
                'title' => 'ششم ابتدایی',
                'grade_id' => 1,
            ],
            //  grade id = 2
            [
                'title' => 'هفتم دبیرستان',
                'grade_id' => 2,
            ],
            [
                'title' => 'هشتم دبیرستان',
                'grade_id' => 2,
            ],
            [
                'title' => 'نهم دبیرستان',
                'grade_id' => 2,
            ],
            // high school
            // math
            [
                'title' => 'دهم ریاضی',
                'field_id' => 3,
            ],
            [
                'title' => ' یازدهم ریاضی',
                'field_id' => 3,
            ],
            [
                'title' => ' دوازدهم ریاضی',
                'field_id' => 3,
            ],
            // Science
            [
                'title' => 'دهم تجربی',
                'field_id' => 3,
            ],
            [
                'title' => ' یازدهم تجربی',
                'field_id' => 3,
            ],
            [
                'title' => ' دوازدهم تجربی',
                'field_id' => 3,
            ],
             //  Humanities
            [
                'title' => 'دهم علوم انسانی',
                'field_id' => 3,
            ],
            [
                'title' => ' یازدهم علوم انسانی',
                'field_id' => 3,
            ],
            [
                'title' => ' دوازدهم علوم انسانی',
                'field_id' => 3,
            ],

        ]);
    }
}
