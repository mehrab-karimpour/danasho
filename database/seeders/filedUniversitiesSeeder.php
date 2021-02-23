<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class filedUniversitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('filed_universities')->insert([
            [
                'title'=>'مهندسی برق'
            ],
            [
                'title'=>'مهندسی شهرسازی'
            ],
            [
                'title'=>'مهندسی نفت'
            ],
            [
                'title'=>'علوم مهندسی'
            ],
            [
                'title'=>'مکاترونیک	'
            ],
            [
                'title'=>'ریاضیات و کاربردها'
            ],
            [
                'title'=>'مهندسی ماشینهای کشاورزی'
            ],
            [
                'title'=>'مهندسی مکانیک نیروگاه	'
            ],
            [
                'title'=>'مهندسی مکانیک	'
            ],
            [
                'title'=>'مهندسی صنایع	'
            ],
            [
                'title'=>'مهندسی معدن	'
            ],
            [
                'title'=>'کاردان فنی مکانیک	'
            ],
            [
                'title'=>'کارشناسی چند رسانه ای	'
            ],
            [
                'title'=>'هوانوردی-ناوبری هوایی	'
            ],
            [
                'title'=>'علوم و فنون هوانوردی - خلبانی هلیکوپتری'
            ],
            [
                'title'=>'مهندسی معماری	'
            ],
            [
                'title'=>'مهندسی پزشکی	'
            ],
            [
                'title'=>'زیست شناسی	'
            ],
            [
                'title'=>'بهداشت مواد غذایی	'
            ],
            [
                'title'=>'کارشناسی تکنولوژی پرتوشناسی- رادیولوژی	'
            ],
            [
                'title'=>'عکاسی	'
            ],
            [
                'title'=>'مامایی'
            ],
            [
                'title'=>'پرستاری'
            ],
            [
                'title'=>'اعضای مصنوعی'
            ],
            [
                'title'=>'حقوق'
            ],
            [
                'title'=>'مدیریت'
            ],
            [
                'title'=>'مطالعات خانواده'
            ],
            [
                'title'=>'آلمانی'
            ],
            [
                'title'=>'فیزیک مهندسی'
            ],
            [
                'title'=>'کاردان فنی معدن'
            ],
            [
                'title'=>'مهندسی کشاورزی'
            ],
            [
                'title'=>'مهندسی رباتیک'
            ],
            [
                'title'=>'مهندسی انرژی'
            ],
            [
                'title'=>'فیزیک	'
            ],
            [
                'title'=>'کاردانی هواپیما'
            ],
            [
                'title'=>'مهندسی راه آهن'
            ],
            [
                'title'=>'مهندسی نساجی'
            ],
            [
                'title'=>'مهندسی هوافضا	'
            ]

        ]);

    }
}
