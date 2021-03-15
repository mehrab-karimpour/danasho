<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Credit;
use App\Models\CreditItem;

use App\Models\DatePeriod;
use App\Models\Field;
use App\Models\Grade;
use App\Models\LessonProfessor;
use App\Models\PollSubject;
use App\Models\Score;
use App\Models\Survey;
use App\Models\TeachingDates;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;

class panelController extends Controller
{
    public function getStudentUpdate(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $professorCanTeaching = false;
            if ($request->getStudentStatus === "on") {
                $professorCanTeaching = true;
            }
            User::find(Auth::id())->update([
                'professor_active' => $professorCanTeaching
            ]);
            return redirect()->back()->with(['status' => 'success'], 201);
        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()->with(['status' => 'error'], 412);
        }
    }

    public function getStudentStatus(): \Illuminate\Http\Response
    {
        $user = Auth::user();
        return response()->view('panel.professor.getStudent', compact('user'));
    }

    public function updateTeachingDates(Request $request): \Illuminate\Http\RedirectResponse
    {
        $i = 0;
        $items = [];
        $user_id = Auth::id();
        $data = $request->except('_token');
        $persianNow = Carbon::now()->format('Y-m-d H:m:s');
        foreach ($data as $item) {
            foreach ($item as $key => $row) {
                $explodeItems = explode('$', $row);
                $date_period_id = $explodeItems[0];
                $key = $explodeItems[1];
                $datePersian = $explodeItems[2];
                $index = $explodeItems[3];
                $date = $explodeItems[4];
                $items[$i]['date_period_id'] = $date_period_id;
                $items[$i]['key'] = $key;
                $items[$i]['datePersian'] = $datePersian;
                $items[$i]['index'] = $index;
                $items[$i]['date'] = $date;
                $items[$i]['user_id'] = $user_id;
                $items[$i]['created_at'] = $persianNow;
                $items[$i]['updated_at'] = $persianNow;
                $i++;
            }
        }

        try {
            TeachingDates::where('user_id', $user_id)->delete();
            TeachingDates::insert($items);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error');
        }

    }

    public function selectTeachingDates(): \Illuminate\Http\Response
    {

        $teachingDates = [];
        $teachingDates = $this->getDatesSelectWeekly($teachingDates);
        $periodDateClasses = DatePeriod::all();

        $teachingDatesSaved = TeachingDates::where('user_id', Auth::id())->with('datePeriods')->get();

        return response()->view('panel.professor.dates-select-teaching',
            compact('teachingDates', 'periodDateClasses', 'teachingDatesSaved'));
    }

    public function onlineSelectTeachingRecord(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $user_id = Auth::id();
            $lessonProfessorRows = [];
            foreach ($request->lesson as $item) {
                $lessonProfessorRows[] = [
                    'lesson_id' => $item,
                    'professor_id' => $user_id
                ];
            }
            LessonProfessor::insert($lessonProfessorRows);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('status', 'error');
        }
    }

    //  select online teaching professor
    public function onlineSelectTeaching(): \Illuminate\Http\Response
    {
        $books = Book::with('lessons')->get();
        return response()->view('panel.professor.online-select-teaching', compact('books'));
    }

    public function increaseCredit(): \Illuminate\Http\Response
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

    /**
     * @param $teachingDates
     * @return mixed
     */
    public function getDatesSelectWeekly($teachingDates)
    {
        for ($i = 1; $i < 8; $i++) {
            $teachingDates[$i]['datePersian'] = Verta::now()->addDays($i)->format('Y/m/d l');
            $teachingDates[$i]['date'] = Carbon::now()->addDays($i)->format('Y-m-d');
            $teachingDates[$i]['key'] = Carbon::now()->addDays($i)->format('l');
            $teachingDates[$i]['index'] = $i;
        }
        return $teachingDates;
    }
}
