<?php

namespace App\Listeners;

use App\Events\onlineClassCreated;
use App\Models\DatePeriod;
use App\Models\Lesson;
use App\Models\LessonProfessor;
use App\Models\Online;
use App\Models\TeachingDates;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class informProfessorOnlineCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param onlineClassCreated $event
     * @return void
     */
    public function handle(onlineClassCreated $event)
    {
        $teachingDateProfessorIdes = [];
        $lessonProfessorIdes = [];

        $newOnlineClass = Online::find($event->onlineClassID);
        $lessonId = Lesson::where('title', $newOnlineClass->lesson)->first()->id;
        $date = explode('-', $newOnlineClass->date);
        $today = \Illuminate\Support\Carbon::createFromDate($date[0], $date[1], $date[2])->format('l');

        $teachingDates = TeachingDates::where([
            'date_period_id' => $newOnlineClass->period_id,
            'key' => $today
        ])->get();
        foreach ($teachingDates as $teachingDate) {
            $teachingDateProfessorIdes[] = $teachingDate->user_id;
        }

        $allLessonProfessor = LessonProfessor::where("lesson_id", $lessonId)->get();
        foreach ($allLessonProfessor as $item) {
            $lessonProfessorIdes[] = $item->professor_id;
        }
        $mainProfessorIds = array_intersect($teachingDateProfessorIdes, $lessonProfessorIdes);
        $mainProfessors = User::whereIn("id", $mainProfessorIds)->get();
        foreach ($mainProfessors as $mainProfessor) {
            DB::table('test')->insert([
                'name' => $mainProfessor->fullName
            ]);
        }

    }
}
