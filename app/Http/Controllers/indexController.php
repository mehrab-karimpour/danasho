<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class indexController extends Controller
{
    public function index(): \Illuminate\Http\Response
    {
        return response()->view('Client.index.index');
    }

    public function set()
    {
        Session::put('id', "34");
        $grade = 1;
        $grade_id = Session::get('id');
        switch ($grade_id) {
            case "2":
                $grade = 2;
                break;
            case "3":
                $grade = 3;
                break;
        }
        $price = DB::table('prices')
            ->where('grade_id', $grade)
            ->first();
        echo $price->title;

    }
}
