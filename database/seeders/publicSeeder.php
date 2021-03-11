<?php

namespace Database\Seeders;

use App\Models\DatePeriod;
use App\Models\Price;
use App\Models\Question;
use App\Models\Time;
use Illuminate\Database\Seeder;

class publicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  set  price
        $price = new Price();
        $price->grade_id = 1;
        $price->type = "onlineClass";
        $price->title = '7';
        $price->save();

        $price = new Price();
        $price->grade_id = 2;
        $price->type = "onlineClass";
        $price->title = '7';
        $price->save();

        $price = new Price();
        $price->grade_id = 1;
        $price->type = "offlineClass";
        $price->title = '5';
        $price->save();


        $price = new time();
        $price->title = "15";
        $price->save();

        $price = new time();
        $price->title = "30";
        $price->save();

        $price = new time();
        $price->title = "45";
        $price->save();

        $price = new time();
        $price->title = "60";
        $price->save();

        $period = new DatePeriod();
        $period->title = "ساعت 9:00 تا 15:000";
        $period->period_key = 15;
        $period->save();
        $period = new DatePeriod();
        $period->title = "ساعت 15:00 تا 18:000";
        $period->period_key = 18;
        $period->save();
        $period = new DatePeriod();
        $period->title = "ساعت 18:00 تا 22:000";
        $period->period_key = 22;
        $period->save();

        $question = new Question();
        $question->title = 3;
        $question->description = '1 الی 3 سوال';
        $question->save();

        $question = new Question();
        $question->title = 6;
        $question->description = '4 الی 6 سوال';
        $question->save();

        $question = new Question();
        $question->title = 9;
        $question->description = '7 الی 9 سوال';
        $question->save();

        $question = new Question();
        $question->title = 12;
        $question->description = '10 الی 12 سوال';
        $question->save();
    }
}
