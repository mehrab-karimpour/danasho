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
        Session::remove('id');
        Session::remove('gradeId');
        Session::remove('verifyPassword');

        return response()->view('Client.index.index');
    }

    public function set()
    {
        Session::put('id',"1");
        $id=Session::get('id');
        $id=intval($id);

        $price = DB::table('prices')
            ->where('grade_id', $id)
            ->first();

        dd($price->title);
    }
}
