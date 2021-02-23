<?php

namespace Database\Seeders;

use App\Models\Credit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin
        $admin = new User();
        $admin->mobile = "09181234567";
        $admin->fullName = "داناشو";
        $admin->password = Hash::make('121212');
        $admin->assignRole('admin');
        $admin->save();

        $credit = new Credit();
        $credit->creditLevel = 0;
        $credit->user_id = $admin->id;
        $credit->save();

        // student
        $student = new User();
        $student->mobile = "09054603316";
        $student->fullName = "مبینا کریم پور";
        $student->password = Hash::make('121212');
        $student->assignRole('student');
        $student->save();

        // professor
        $professor = new User();
        $professor->mobile = "09180131109";
        $professor->fullName = "محراب کریم پور";
        $professor->password = Hash::make('121212');
        $professor->assignRole('professor');
        $professor->save();
    }
}
