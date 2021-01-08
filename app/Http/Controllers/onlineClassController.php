<?php

namespace App\Http\Controllers;

use App\Events\sendVerify;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class onlineClassController extends Controller
{
    public $onlineClassId;
    protected $mobile;
    protected $password;
    protected $name;

    public function EndRecord(Request $request)
    {
        $this->mobile = Session::get('mobile');
        $this->password = $request->password;
        $this->name = Session::get('name');
        try {
            recordUpdate(Session::get('id'), 'mobile', $this->mobile);
            recordUpdate(Session::get('id'), 'name', $this->name);

            $user = User::where('mobile', $request->mobile)->firstOr(function () {

                User::create([
                    'mobile' => $this->mobile,
                    'password' => Hash::make($this->password),
                    'name' => $this->name
                ]);
            });
            recordUpdate(Session::get('id'), 'user_id', $user->id);


        } catch (\Exception $e) {

        }

    }

    public function recordNameMobile(Request $request)
    {

        recordUpdate(Session::get('id'), 'name', $request->name);
        recordUpdate(Session::get('id'), 'mobile', $request->mobile);

        if (User::where('mobile', "09180131109")->exists()) {
            $password = rand(100000, 999999);
        } else {
            $password = rand(1000, 9999);
        }
        Session::put('verifyPassword', $password);
        //event(sendVerify::class);
        return response()->json(['status' => 'success']);
    }

    public function descriptionHandle(Request $request)
    {
        try {
            recordUpdate(Session::get('id'), 'level', $request->level);
            recordUpdate(Session::get('id'), 'description', $request->description);
            return response()->json(["status" => 'success'], 201);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(["status" => 'error'], 422);
        }
    }

    public function getGrade(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            return response()->json(getGrades());
        } catch (\Exception $e) {
            Log::error("درخواست ثبت کلاس انجام نشد ! $e");
            return response()->json('error');
        }
    }

    public function getDate()
    {
        for ($j = 0; $j < 7; $j++) {
            $week[] = $j;
        }
        $days = [];
        foreach ($week as $item) {
            $days[]['title'] = Verta::now()->addDays($item)->formatWord('l') . ' ' . Verta::now()->addDays($item)->format('d-m-Y');
        }
        foreach ($week as $key => $day) {
            $days[$key]['id'] = Carbon::now()->addDays($day)->format('Y-m-d');
        }
        return response()->json([$days, 5]);
    }

    public function getTime(Request $request)
    {
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

    public function recordStepOneHandle(Request $request)
    {

        switch ($request->turn) {
            case "1":
                // record grade

                if (Session::get('id')) {
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
            case 4:
                // record date and price
                return $this->recordPriceAndTime($request);
                break;
            case 5:
                // record date
                return $this->recordDate($request);
                break;
            case 6:
                // record date
                return $this->recordPeriod($request);
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

    public function recordUnit(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('id'), 'unit', $request->step);
        return response()->json([getLessons($request->dataID), 3]);
    }


    public function recordLesson(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('id'), 'lesson', $request->step);
        $grade_id = Session::get('gradeId');
        $grade_id = intval($grade_id);
        $price = DB::table('prices')
            ->where('grade_id', $grade_id)
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


    public function recordPriceAndTime(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('id'), 'time', $request->step);
        recordUpdate(Session::get('id'), 'price', calculatePrice(Session::get('gradeId'), $request->dataID));
        $week = [0, 1, 2, 3, 4, 5, 6, 7];
        $days = [];
        foreach ($week as $item) {
            $days[]['title'] = Verta::now()->addDays($item)->formatWord('l') . ' ' . Verta::now()->addDays($item)->format('d-m-Y');
        }
        foreach ($week as $key => $day) {
            $days[$key]['id'] = Carbon::now()->addDays($day)->format('Y-m-d');
        }
        return response()->json([$days, 5]);
    }


    public function recordDate(Request $request): \Illuminate\Http\JsonResponse
    {

        recordUpdate(Session::get('id'), 'day', $request->step);
        recordUpdate(Session::get('id'), 'date', $request->dataID);

        return response()->json([getDatePeriods(), 6]);
    }

    public function recordPeriod(Request $request)
    {
        recordUpdate(Session::get('id'), 'period', $request->dataID);
        $day = Session::get('day');
        return response()->json(["$day  $request->step", 6]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editGrade(Request $request): \Illuminate\Http\JsonResponse
    {
        recordUpdate(Session::get('id'), 'grade', $request->step);
        return response()->json([getUnits($request->dataID), 2]);
    }
}
