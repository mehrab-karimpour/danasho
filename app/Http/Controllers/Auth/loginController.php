<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


class loginController extends Controller
{
    public function recoveryPasswordCheckVerify(Request $request)
    {
        if (Session::get("password-recovery-verify") == $request->verifyToken) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }


    public function recoveryPassword(Request $request)
    {
        try {
            $user = User::where('mobile', $request->mobile)->first();
            if ($user) {
                $token = rand(4000, 9000);
                Session::put('password-recovery-verify', $token);
                return response()->json(['status' => 'success'], 200);
            } else {
                return response()->json(['status' => 'undefined'], 200);
            }

        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['status' => 'success'], 412);
        }
    }

    public function logOut()
    {
        \auth()->logout();
        return redirect('/login');
    }

    public function login()
    {
        return response()->view('Client.login.login');
    }

    public function doLogin(Request $request)
    {

        try {
            $remember = $request->remember;
            if (User::where('mobile', $request->mobile)->exists()) {
                if (Auth::attempt(['mobile' => $request->mobile, 'password' => $request->password], $remember)) {
                    return redirect('/panel');
                } else {
                    return redirect()->back()->with('status', 'password');
                }
            } else {
                return redirect()->back()->with('status', 'filed');
            }
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('status', 'filed');
        }


    }
}
