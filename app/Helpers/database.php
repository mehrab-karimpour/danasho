<?php


function getUnits()
{
    return \App\Models\Unit::all();
}

function getGrades()
{
    return \App\Models\Grade::all();
}

function getTimes()
{
    return \App\Models\Time::all();
}

function getLessons()
{
    return \App\Models\Lesson::all();
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



