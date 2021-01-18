<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
            case "2":
                //record unit
                return $this->recordUnit($request);
                break;

            case "3":
                // record lesson
                return $this->recordLesson($request);
                break;
            case "4":
                // record lesson
                return $this->recordQuestion($request);
                break;
            case "5":
                // record question file
                return $this->uploadQuestionFile($request);
                break;
            case "6":
                // record get date answer
                return $this->uploadGetDateAnswer($request);
                break;
            case "7":
                // record get period answer
                return $this->uploadGetPeriodAnswer($request);
                break;
            case "8":
                // record get period answer
                return $this->uploadVerifyToken($request);
                break;
            default :
                return "error";
        }
    }

    public function uploadVerifyToken(Request $request)
    {
        if (User::where('mobile', $request->mobile)->exists()) {
            $verifyToken = rand(4000, 4999);
        } else {
            $verifyToken = rand(600000, 699999);
        }
        Session::put('verify-token-offline', $verifyToken);
        return response(['status' => 'success', $verifyToken]);
    }

    public function uploadGetPeriodAnswer(Request $request)
    {
        $offline_id = Session::get('offline-id');
        recordOfflineUpdate($offline_id, 'get_answer_period', $request->dataID);

        if ($request->dataID === Carbon::now()->addDay()->format('Y-m-d')) {
            return response()->json([getDatePeriods(), 7, 1]);
        } else {
            return response()->json([getDatePeriods(), 7, 0]);
        }
    }

    public function uploadGetDateAnswer(Request $request)
    {
        $offline_id = Session::get('offline-id');
        recordOfflineUpdate($offline_id, 'get_answer_date', $request->dataID);

        if ($request->dataID === Carbon::now()->addDay()->format('Y-m-d')) {
            return response()->json([getDatePeriods(), 7, 1]);
        } else {
            return response()->json([getDatePeriods(), 7, 0]);
        }
    }

    public function uploadQuestionFile(Request $request)
    {
        try {
            $offline_id = Session::get('offline-id');
            $file = $request->file('question_file');
            $filePath = $file->getClientOriginalExtension();
            if (Storage::exists("offline/$offline_id/$file")) {
                $fileName = Verta::now()->format('y_m_d_h_i') . '.' . $filePath;
            } else {
                $fileName = Verta::now()->format('y_m_d') . '.' . $filePath;
            }
            recordOfflineUpdate($offline_id, 'question_file', $fileName);
            $file->storeAs("offline/$offline_id/", $fileName);

            /*
             * return date weekly .
             * */
            $week = [];
            for ($i = 0; $i < 8; $i++) {
                $week[] = $i;
            }
            $days = [];
            foreach ($week as $item) {
                $days[]['title'] = Verta::now()->addDays($item)->formatWord('l') . ' ' . Verta::now()->addDays($item)->format('d-m-Y');
            }
            foreach ($week as $key => $day) {
                $days[$key]['id'] = Carbon::now()->addDays($day)->format('Y-m-d');
            }
            return response()->json([$days, 6]);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['status' => 'error'], 422);
        }
    }

    public function recordQuestion(Request $request)//: \Illuminate\Http\JsonResponse
    {
        $offline_id = Session::get('offline-id');
        recordOfflineUpdate($offline_id, 'question_id', $request->dataID);
        return response()->view('Client.index.offlineClass.upload-questions');
    }

    public function recordLesson(Request $request): \Illuminate\Http\JsonResponse
    {
        $offline_id = Session::get('offline-id');
        $grade_id = $this->getGradeID(Session::get('offline-gradeId'));
        recordOfflineUpdate($offline_id, 'lesson', $request->step);
        $questions = Question::all();
        $questions = calculateOfflineQuestion($questions, $grade_id);
        return response()->json([$questions, 4]);
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

        $newOfflineClass = insertNewOfflineClass($request->step);
        Session::put('offline-id', $newOfflineClass->id);
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
