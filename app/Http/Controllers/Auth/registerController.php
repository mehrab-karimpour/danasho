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
            User::create([
                'fullName' => $request->fullName,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return redirect('/login');
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
