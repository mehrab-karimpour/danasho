<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class offlineClassController extends Controller
{
    public function recordStepOne(Request $request)
    {
        switch ($request->turn) {
            case "1":
                // record grade
                if (Session::get('offline-id')) {
                    return $this->editGrade($request);
                } else {
                    return $this->recordGrade($request);
                }
                break;
            case 2:
                //record unit
                return $this->recordUnit($request);
                break;

            case 3:
                // record lesson
                return $this->recordLesson($request);
                break;
            default :
                return "error";
        }
    }

    public function recordLesson(Request $request): \Illuminate\Http\JsonResponse
    {
        recordOfflineUpdate(Session::get('offline-id'), 'lesson', $request->step);
        $grade_id = Session::get('gradeId');

        $grade = $this->getGradeID($grade_id);
        $price = DB::table('prices')
            ->where('grade_id', $grade)
            ->first();

        $allTimes = getTimes();
        foreach ($allTimes as $key => $time) {
            $time = $time->title;
            $p = ($time / 15) * intval($price->title);
            $allTimes[$key]->title = "$time دقیقه $p هزار تومان ";
            $allTimes[$key]->id = $time;
        }
        return response()->json([$allTimes, 4]);
    }

    public function recordUnit(Request $request): \Illuminate\Http\JsonResponse
    {
        recordOfflineUpdate(Session::get('offline-id'), 'unit', $request->step);
        return response()->json([getLessons($request->dataID), 3]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editGrade(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('offline-id'), 'grade', $request->step);
        return response()->json([getUnits($request->dataID), 2]);
    }

    public function recordGrade(Request $request): \Illuminate\Http\JsonResponse
    {

        $insert = insertNewOfflineClass($request->step);
        Session::put('offline-id', $insert->id);
        Session::put('offline-gradeId', $request->dataID);
        return response()->json([getUnits($request->dataID), 2]);
    }

    /**
     * @param $grade_id
     * @return int
     */
    public function getGradeID($grade_id): int
    {
        $grade = 1;
        switch ($grade_id) {
            case "2":
                $grade = 2;
                break;
            case "3":
                $grade = 3;
                break;
        }
        return $grade;
    }

}
