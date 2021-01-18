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
        Session::remove('offline-id');
        Session::remove('offline-gradeId');
        Session::remove('gradeId');
        return response()->view('Client.index.index');
    }

    public function set()
    {
        return Session::get('verify-token-offline');

    }
}
