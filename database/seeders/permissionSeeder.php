<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'agent',
                'guard_name' => 'web'
            ],
            [
                'name' => 'student',
                'guard_name' => 'web'
            ],
            [
                'name' => 'professor',
                'guard_name' => 'web'
            ],
        ]);

    }
}
