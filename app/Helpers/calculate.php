<?php


function returnJalali($gregorianDate)
{

}


function returnGregorian($JalaliDate)
{

}

function returnNumberFormat()
{

}

function calculateOfflineQuestion($countQuestions, $grade_id)
{
    $countQuestions[0]->title = $countQuestions[0]->title + 1;
    $price = \App\Models\Price::where('type', 'offlineClass')->where('grade_id', $grade_id)->first();

    $price = $price->title;
    foreach ($countQuestions as $key => $countQuestion) {
        $price = $countQuestion->title;
        if ($key === 0) {
            $cou2 = $price + 2;
        } else {
            $cou2 = $price + 3;
        }
        $p = intval($price) * $cou2;
        $countQuestions[$key]->title = "$price الی $cou2 سوال $p هزار تومان ";
    }
    return $countQuestions;
}




