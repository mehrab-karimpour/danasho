<?php

namespace Database\Seeders;

use App\Models\DatePeriod;
use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Price;
use App\Models\Time;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // new grades
        $gradeOne = new Grade();
        $gradeOne->title = 'ابتدایی';
        $gradeOne->save();
        $grade = new Grade();
        $grade->title = 'متوسطه اول';
        $grade->save();
        $grade = new Grade();
        $grade->title = ' متوسطه دوم';
        $grade->save();

        //  set  price
        $price = new Price();
        $price->grade_id = $gradeOne->id;
        $price->title = '7000';
        $price->save();


        // new units
        $unitOne = new Unit();
        $unitOne->title = 'اول ابتدایی';
        $unitOne->grade_id = $gradeOne->id;
        $unitOne->save();
        $unit = new Unit();
        $unit->title = 'دوم ابتدایی';
        $unit->grade_id = $gradeOne->id;
        $unit->save();
        $unit = new Unit();
        $unit->title = 'سوم ابتدایی';
        $unit->grade_id = $gradeOne->id;
        $unit->save();
        $unit = new Unit();
        $unit->title = 'چهارم  ابتدایی';
        $unit->grade_id = $gradeOne->id;
        $unit->save();
        $unit = new Unit();
        $unit->title = 'پنجم ابتدایی';
        $unit->grade_id = $gradeOne->id;
        $unit->save();
        $unit = new Unit();
        $unit->title = 'ششم ابتدایی';
        $unit->grade_id = $gradeOne->id;
        $unit->save();

        // new lessons
        $lesson = new Lesson();
        $lesson->unit_id = $unitOne->id;
        $lesson->title = 'ریاضی اول ابتدایی';
        $lesson->save();

        $lesson = new Lesson();
        $lesson->unit_id = $unitOne->id;
        $lesson->title = 'علوم اول ابتدایی';
        $lesson->save();

        $lesson = new Lesson();
        $lesson->unit_id = $unitOne->id;
        $lesson->title = 'فارسی اول ابتدایی';
        $lesson->save();

        $lesson = new Lesson();
        $lesson->unit_id = $unitOne->id;
        $lesson->title = 'نگارش اول ابتدایی';
        $lesson->save();

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

    }
}
