<?php

namespace App\Http\Controllers;

use App\Models\CreditItem;
use App\Models\Field;
use App\Models\Grade;
use App\Models\PollSubject;
use App\Models\Score;
use App\Models\Survey;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class panelController extends Controller
{

    //  select online teaching professor
    public function onlineSelectTeaching()
    {
        return response()->view('panel.professor.online.select.teaching');
    }

    public function increaseCredit()
    {
        $userCredit = Auth::user()->credit;
        $creditItems = CreditItem::all();
        return response()->view('panel.increase-credit',
            compact('creditItems', 'userCredit'));
    }

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

    public function editProfileProfessor(Request $request)
    {

        try {
            $data = $request->except([
                '_token',
                'bank_card_image',
                'professor_tags_image',
                'cv_image',
                'university_image',
                'national_image'
            ]);
            $user = Auth::user();
            $user_id = $user->id;
            if ($request->national_image) {
                $oldImage = $user->national_image;
                $requestImage = "national_image";
                $imageName = $this->uploadFilesProfessor($requestImage, $user_id, $oldImage, $request);
                $data['national_image'] = $imageName;
            }
            if ($request->university_image) {
                $oldImage = $user->university_image;
                $requestImage = "university_image";
                $imageName = $this->uploadFilesProfessor($requestImage, $user_id, $oldImage, $request);
                $data['university_image'] = $imageName;
            }
            if ($request->cv_image) {
                $oldImage = $user->cv_image;
                $requestImage = "cv_image";
                $imageName = $this->uploadFilesProfessor($requestImage, $user_id, $oldImage, $request);
                $data['cv_image'] = $imageName;
            }
            if ($request->professor_tags_image) {
                $oldImage = $user->professor_tags_image;
                $requestImage = "professor_tags_image";
                $imageName = $this->uploadFilesProfessor($requestImage, $user_id, $oldImage, $request);
                $data['professor_tags_image'] = $imageName;
            }
            if ($request->bank_card_image) {
                $oldImage = $user->bank_card_image;
                $requestImage = "bank_card_image";
                $imageName = $this->uploadFilesProfessor($requestImage, $user_id, $oldImage, $request);
                $data['bank_card_image'] = $imageName;
            }

            $date = $request->birthDate;
            $newDate = returnGregorian($date, '-');

            $data['birthDate'] = $newDate;

            $user = User::find(Auth::id())->update($data);

            return redirect()->back()->with("status", "success");
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with("status", "error");
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
        return response()->view('panel.online-create');
    }

    public function onlineReserved()
    {
        $user = Auth::user();
        $allOnlineClass = $user->onlineReserved;
        return response()->view('panel.online-reserved', compact('allOnlineClass'));
    }

    public function onlineHeld()
    {
        $user = Auth::user();
        $allOnlineClass = $user->onlineHeld;
        $scores = Score::all();
        $pollSubjects = PollSubject::all();
        return response()->view('panel.online-held',
            compact('allOnlineClass', 'scores', 'pollSubjects'));
    }

    public function uploadFilesProfessor($requestImage, $user_id, $oldImage, Request $request)
    {
        if (Storage::exists("/users/$user_id/profile/$oldImage")) {
            Storage::delete("/users/$user_id/profile/$oldImage");
        }
        $path = $request->file("$requestImage")->getClientOriginalExtension();
        $now = Carbon::now()->format('Y_m_d');
        $imageName = "$requestImage" . '.' . $now . '.' . $path;
        $request->file("$requestImage")->storeAs("/users/$user_id/profile/", $imageName);
        return $imageName;
    }
}
