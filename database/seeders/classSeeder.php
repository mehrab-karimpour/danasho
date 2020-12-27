<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Lesson;
use App\Models\Price;
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


    }
}
