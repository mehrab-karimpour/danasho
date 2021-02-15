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
        $admin = new User();
        $admin->mobile = "09180131109";
        $admin->fullName = "داناشو";
        $admin->password = Hash::make('121212');
        $admin->save();
        $credit = new Credit();
        $credit->creditLevel = 0;
        $credit->user_id = $admin->id;
        $credit->save();

        $agent = new User();
        $agent->mobile = "09054603316";
        $agent->fullName = "محراب کریم پور";
        $agent->password = Hash::make('111111');
        $agent->save();
    }
}
