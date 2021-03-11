<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
            [
                'title' => 'گروه ریاضی فیزیک',
                'grade_id' => 3,
            ], [
                'title' => 'گروه علوم تجربی',
                'grade_id' => 3,
            ], [
                'title' => 'گروه علوم انسانی',
                'grade_id' => 3,
            ],
        ]);
    }
}
