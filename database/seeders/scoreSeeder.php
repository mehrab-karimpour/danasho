<?php

namespace Database\Seeders;

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
        $score->save();

        $score = new Score();
        $score->score_title = 'ضعیف';
        $score->save();

        $score = new Score();
        $score->score_title = 'متوسط';
        $score->save();

        $score = new Score();
        $score->score_title = 'خوب';
        $score->save();

        $score = new Score();
        $score->score_title = 'عالی';
        $score->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی دبیر';
        $survey->title = 'تسلط علمی استاد بر موضوع';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی دبیر';
        $survey->title = 'قدرت بیان و انتقال مطالب';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی دبیر';
        $survey->title = 'وقت شناسی دبیر';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی دبیر';
        $survey->title = 'رفتار محترمانه';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی دبیر';
        $survey->title = 'میزان رضایت کلی شما از دبیر';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی سامانه داناشو';
        $survey->title = 'کیفیت ارتباط تصویری';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی سامانه داناشو';
        $survey->title = 'کیفیت ارتباط صوتی';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی سامانه داناشو';
        $survey->title = 'نحوه هماهنگی برگزاری کلاس';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی سامانه داناشو';
        $survey->title = 'امکانات سامانه برای اراـُه تدریس با کیفیت ';
        $survey->save();

        $survey = new Survey();
        $survey->type = 'ارزیابی سامانه داناشو';
        $survey->title = 'میزان رضایت کلی شما از سامانه ';
        $survey->save();


    }
}
