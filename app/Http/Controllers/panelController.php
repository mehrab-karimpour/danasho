<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Grade;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class panelController extends Controller
{

    public function uploadImageProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pic' => 'required|image|mimes:jpeg,png,jpg|max:20048',
        ]);
        if ($validator->fails()) {
            return response()->json('errors', [$validator->errors()->all()]);
        }
        try {

            $file = $request->file('pic');
            $user_id = Auth::id();
            $newName = 'img.' . $file->getClientOriginalExtension();
            if (Storage::exists('users/' . $user_id . '/profile/')) {
                Storage::deleteDirectory('users/' . $user_id . "/profile");
            }
            $request->file('pic')->storeAs('users/' . $user_id . "/profile/", $newName);
            User::find($user_id)->update([
                'img' => $newName
            ]);
            return $newName;
        } catch (\Exception $e) {
            return false;
        }
    }


    public function updateProfile(Request $request)
    {
        try {
            $userID = \auth()->id();
            $birthDate = returnGregorian($request->birthDate, '-');
            $user = User::find($userID)->update([
                'fullName' => $request->fullName,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'gender' => $request->gender,
                'birthDate' => $birthDate,
                'grade_id' => $request->grade,
                'field_id' => $request->field,
                'unit_id' => $request->unit,
                'typeSchool' => $request->typeSchool_id,
                'state' => $request->state,
                'city' => $request->city,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with('status', 'error');
        }
    }

    public function editProfile()
    {
        $states = DB::table('states')->get();
        $cities = DB::table('cities')->get();
        $grades = Grade::all();
        $units = Unit::all();
        $fields = Field::all();
        $user = Auth::user();
        return response()->view('panel.edit-profile',
            compact('user', 'states', 'cities', 'grades', 'units', 'fields'));
    }

    public function home()
    {
        return response()->view('panel.home');
    }

    public function onlineRequest()
    {

    }

    public function onlineReserved()
    {
        $user = Auth::user();
        $allOnlineClass = $user->online;
        return response()->view('panel.online-reserved',compact('allOnlineClass'));
    }
}
