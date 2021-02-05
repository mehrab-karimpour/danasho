<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class loginController extends Controller
{

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
