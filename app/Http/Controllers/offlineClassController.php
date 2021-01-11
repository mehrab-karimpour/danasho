<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class offlineClassController extends Controller
{
    public function recordStepOne(Request $request)
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
            default :
                return "error";
        }
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
        $insert = insertNewOnlineClass($request->step);
        Session::put('offline-id', $insert->id);
        Session::put('offline-gradeId', $request->dataID);
        return response()->json([getUnits($request->dataID), 2]);
    }


}
