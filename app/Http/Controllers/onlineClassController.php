<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class onlineClassController extends Controller
{
    public function getGrade()
    {
        try {
            return response()->json(getGrades());
        } catch (\Exception $e) {
            Log::error("درخواست ثبت کلاس انجام نشد ! $e");
            return response()->json('error');
        }
    }
}
