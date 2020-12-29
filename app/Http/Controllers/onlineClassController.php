<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class onlineClassController extends Controller
{
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

                $data = [ 'grade' => $request->step];
                Session::put('onlineClass', $data);
                return response()->json([getUnits($request->dataID), 2]);
                break;
            case 2:

                $data = Session::get("onlineClass");
                $data['unit'] = $request->step;
                Session::put('onlineClass', $data);
                return response()->json([getLessons($request->dataID), 3]);
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
}
