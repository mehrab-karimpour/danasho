<?php


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
    return \App\Models\Price::all();
}

function getStates()
{

}

function getCities()
{

}



