<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'ریاضی'  //1
            ], [
                'title' => 'فیزیک'   //2
            ], [
                'title' => 'شیمی'    //3
            ], [
                'title' => 'علوم'   // 4
            ], [
                'title' => 'زیست شناسی' // 5
            ], [
                'title' => 'عربی'     // 6
            ], [
                'title' => 'انگلیسی'  //7
            ], [
                'title' => 'فارسی'    // 8
            ], [
                'title' => 'نگارش'    // 9
            ], [
                'title' => 'دینی'    // 10
            ], [
                'title' => 'مطالعات اجتماعی' // 11
            ], [
                'title' => ' اجتماعی'    // 12
            ], [
                'title' => ' کار و فناوری'  // 13
            ], [
                'title' => ' علوم و فنون ادبی'  // 14
            ], [
                'title' => ' تاریخ'         // 15
            ], [
                'title' => ' جغرافیا'       // 16
            ], [
                'title' => ' فلسفه'        // 17
            ], [
                'title' => ' زمین شناسی'    // 18
            ], [
                'title' => 'جامعه شناسی'    // 19
            ], [
                'title' => 'روانشناسی'      // 20
            ], [
                'title' => 'منطق'           // 21
            ], [
                'title' => 'اقتصاد'         // 22
            ],
        ]);
    }
}
