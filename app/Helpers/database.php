<?php


function calculatePrice($gradeId, $time)
{
    $price = \App\Models\Price::where('grade_id', $gradeId)->first()->title;
    return ($time / 15) * intval($price);
}

function insertNewOnlineClass($grade)
{
    return \App\Models\Online::create([
        'grade' => $grade
    ]);
}

function insertNewOfflineClass($grade)
{
    return \App\Models\Offline::create([
        'grade' => $grade
    ]);
}

function recordOfflineUpdate($classId, $item, $value)
{
    return \App\Models\Offline::where('id', '=', $classId)->update([
        "$item" => $value
    ]);
}

function getQuestions()
{
    return \App\Models\Question::all();
}



function recordUpdate($classId, $item, $value)
{
    return \App\Models\Online::where('id', '=', $classId)->update([
        "$item" => $value
    ]);
}


function getDatePeriods()
{
    return \App\Models\DatePeriod::all();
}

function getUnits($gradeID)
{
    $grade = \App\Models\Grade::find($gradeID);
    return $grade->units;
}


function getGrades()
{
    return \App\Models\Grade::all();
}

function getTimes()
{
    return \App\Models\Time::all();
}

function getLessons($unitID)
{
    $lesson = \App\Models\Unit::find($unitID);
    return $lesson->lessons;
}

function getPrices($gradeID)
{
    $grade = \App\Models\Grade::find($gradeID);
    return $grade->price;
}

function getStates()
{

}

function getCities()
{

}



