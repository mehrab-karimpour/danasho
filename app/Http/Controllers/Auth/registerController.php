<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class registerController extends Controller
{
    public function register()
    {
        return response()->view('Client.register.register');
    }

    public function create(Request $request)
    {
        try {
            if (User::where('mobile', $request->mobile)->exists()) {
                return redirect()->back()->with('status', 'mobile');
            } else {
                $user = User::create([
                    'fullName' => $request->fullName,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);
                if ($request->user_type === 'student')
                    $user->assignRole('student');
                $user->assignRole('professor');

                return redirect('/login')->with('status', 'success');
            }

        } catch (\Exception $e) {

            return redirect()->back()->with('status', 'error');
        }
    }

    public function passwordRequest(Request $request)
    {
        try {
            $password = rand(300000, 999999);
            Session::put($password);
            return response()->json('success');
        } catch (\Exception $e) {
            return response()->json('error');
        }

    }

}
