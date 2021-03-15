<?php

namespace App\Http\Controllers;

use App\Events\ImageSize;
use App\Events\onlineClassCreated;
use App\Models\DatePeriod;
use App\Models\Lesson;
use App\Models\LessonProfessor;
use App\Models\Online;
use App\Models\Price;
use App\Models\TeachingDates;
use App\Models\Time;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class onlineClassController extends Controller
{

    public function professorSelected()
    {
        return DB::table('test')->get();
    }

    public function getPass()
    {
        return ['online' => Session::get('online-class-verify'),
            'offline' => Session::get('offline-class-verify'),
            'password-recovery-token' => Session::get('password-recovery-verify'),
        ];
    }

    public function create(Request $request)
    {

        try {
            $time = Time::find($request->time)->title;
            $date = explode('-', $request->date);
            $day = Verta::createDate($date[0], $date[1], $date[2])->format('Y/m/d l');
            $price = calculatePrice('onlineClass', $request->grade_id, $time);
            $time = $time . " دقیقه";
            $newName = null;
            if ($request->has('img')) {
                $file = $request->file('img');
                $newName = Carbon::now()->format('Y_m_d') . '.' . $file->getClientOriginalExtension();

            }

            $newOnlineClass = Online::create([
                'user_id' => intval($request->user_id),
                'grade' => $request->grade,
                'unit' => $request->unit,
                'lesson' => $request->lesson,
                'time' => $time,
                'price' => $price,
                'date' => $request->date,
                'day' => $day,
                'period' => $request->period,
                'period_id' => $request->periodId,
                'level' => $request->level,
                'name' => $request->name,
                'description' => $request->description,
                'mobile' => $request->mobile,
            ]);
            /*      upload image questions     */
            if ($request->has('img')) {
                $user_id = $request->user_id;
                $path = 'users/' . $user_id . "/online/" . $newOnlineClass->id . "/";
                $file->storeAs($path, $newName);
                $format = $file->getClientOriginalExtension();
                ImageSize::dispatch($path . $newName, $format);
            }

            onlineClassCreated::dispatch($newOnlineClass->id);

            return response()->view('Client.index.onlineClass.success-create', compact('newOnlineClass'));
        } catch (\Exception $e) {
            Log::error($e);
            return $e;
        }
    }


    public function checkVerifyPassword(Request $request)
    {
        return Session::get('online-class-verify') == $request->checkVerifyPassword;
    }

    public function mobileHandle(Request $request)
    {
        try {
            $user = User::where('mobile', $request->mobile)->first();
            if ($user === null) {
                $password = rand(600000, 900000);
                User::create([
                    'mobile' => $request->mobile,
                    'fullName' => $request->name,
                    'password' => Hash::make($password),
                ]);
            } else {
                $password = rand(6000, 9000);
            }
            Session::put('online-class-verify', $password);
            return response()->json(['user_id' => $user->id]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json('error');
        }
    }

    public function index()
    {
        try {
            $grades = getGrades();
            $units = Unit::all();
            $lessons = Lesson::all();
            $times = Time::all();
            $prices = Price::where('type', 'onlineClass')->get();
            $dates = $this->getDate();
            $periods = DatePeriod::all();
            $data = [
                'grades' => $grades,
                'units' => $units,
                'lessons' => $lessons,
                'times' => $times,
                'prices' => $prices,
                'dates' => $dates,
                'periods' => $periods
            ];
            return response()->json($data);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(null);
        }

    }

    public function getDates(Request $request)
    {
        try {
            $periods = DatePeriod::all();
            $dates = $this->getDate();
            return response()->json(['dates' => $dates, 'periods' => $periods]);
        } catch (\Exception $e) {
            Log::error($e);
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
        return $days;
    }


}
