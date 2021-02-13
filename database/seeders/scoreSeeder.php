<?php

namespace Database\Seeders;

use App\Models\PollSubject;
use App\Models\Score;
use App\Models\Survey;
use Illuminate\Database\Seeder;

class scoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $score = new Score();
        $score->score_title = 'بد';
        $score->score_value = 1;
        $score->save();

        $score = new Score();
        $score->score_title = 'ضعیف';
        $score->score_value = 2;
        $score->save();

        $score = new Score();
        $score->score_title = 'متوسط';
        $score->score_value = 3;
        $score->save();

        $score = new Score();
        $score->score_title = 'خوب';
        $score->score_value = 4;
        $score->save();

        $score = new Score();
        $score->score_title = 'عالی';
        $score->score_value = 5;
        $score->save();

        $pollSubjectOne = new PollSubject();
        $pollSubjectOne->title = 'ارزیابی دبیر';
        $pollSubjectOne->protected = false;
        $pollSubjectOne->save();

        $pollSubjectTwo = new PollSubject();
        $pollSubjectTwo->title = 'ارزیابی سامانه داناشو';
        $pollSubjectTwo->protected = true;
        $pollSubjectTwo->save();


        /*    create survey section :      */

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectOne->id;
        $survey->title = 'تسلط علمی استاد بر موضوع';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectOne->id;
        $survey->title = 'قدرت بیان و انتقال مطالب';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectOne->id;
        $survey->title = 'وقت شناسی دبیر';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectOne->id;
        $survey->title = 'رفتار محترمانه';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectOne->id;
        $survey->title = 'میزان رضایت کلی شما از دبیر';
        $survey->save();

        /*  poll danasho  */
        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectTwo->id;
        $survey->title = 'کیفیت ارتباط تصویری';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectTwo->id;
        $survey->title = 'کیفیت ارتباط صوتی';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectTwo->id;
        $survey->title = 'نحوه هماهنگی برگزاری کلاس';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectTwo->id;
        $survey->title = 'امکانات سامانه برای اراـُه تدریس با کیفیت ';
        $survey->save();

        $survey = new Survey();
        $survey->poll_subject_id = $pollSubjectTwo->id;
        $survey->title = 'میزان رضایت کلی شما از سامانه ';
        $survey->save();


    }
}
