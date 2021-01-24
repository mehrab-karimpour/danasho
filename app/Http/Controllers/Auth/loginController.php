<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login()
    {
        return response()->view('Client.login.login');
    }

    public function doLogin(Request $request)
    {

    }
}
