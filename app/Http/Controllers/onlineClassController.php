<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class onlineClassController extends Controller
{
    public $onlineClassId;

    public function getGrade(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            return response()->json(getGrades());
        } catch (\Exception $e) {
            Log::error("درخواست ثبت کلاس انجام نشد ! $e");
            return response()->json('error');
        }
    }

    public function recordHandle(Request $request)
    {

        switch ($request->turn) {
            case 1:
                // record grade
                return $this->recordGrade($request);
                break;

            case 2:
                //record unit
                return $this->recordUnit($request);
                break;

            case 3:
                // record lesson
                return $this->recordLesson($request);

            case 4:
                // record price and time
                return $this->recordPriceAndTime($request);
                break;

            case 5:
                // record date
                return $this->recordDate($request);
                break;
            case 6:
                // record period
                recordUpdate(Session::get('id'), 'period', $request->dataID);

                return ['success', 7, Session::get('day').' '.$request->step];
                break;

            default:
                return "error";
        }


    }

    public function back(Request $request)
    {
        switch ($request->number) {
            case 1:
                break;
            case 2:
                break;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recordGrade(Request $request): \Illuminate\Http\JsonResponse
    {
        $insert = insertNewOnlineClass($request->step);
        Session::put('id', $insert->id);
        Session::put('gradeId', $request->dataID);
        return response()->json([getUnits($request->dataID), 2]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recordUnit(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('id'), 'unit', $request->step);
        return response()->json([getLessons($request->dataID), 3]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recordLesson(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('id'), 'lesson', $request->step);

        $price = DB::table('prices')
            ->where('grade_id', '=', Session::get('gradeId'))
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recordPriceAndTime(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('id'), 'time', $request->step);
        recordUpdate(Session::get('id'), 'price', calculatePrice(Session::get('gradeId'), $request->dataID));
        $week = [1, 2, 3, 4, 5, 6, 7];
        $days = [];
        foreach ($week as $item) {
            $days[]['title'] = Verta::now()->addDays($item)->formatWord('l') . ' ' . Verta::now()->addDays($item)->format('y-m-d');
        }
        foreach ($week as $key => $day) {
            $days[$key]['id'] = Carbon::now()->addDays($day)->format('Y-m-d');
        }
        return response()->json([$days, 5]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recordDate(Request $request): \Illuminate\Http\JsonResponse
    {
        Session::put('day', $request->step);
        recordUpdate(Session::get('id'), 'day', $request->step);
        recordUpdate(Session::get('id'), 'date', $request->dataID);
        return response()->json([getDatePeriods(), 6]);
    }
}
