<?php


use Hekmatinasser\Verta\Verta;

function returnCreatedAtJalali($gregorianDate, $delimiter)
{
    $mainDate=explode(' ',$gregorianDate);
    $bD = explode("$delimiter", $mainDate[0]);
    $y = to_en_numbers($bD[0]);
    $m = to_en_numbers($bD[1]);
    $d = to_en_numbers($bD[2]);
    return implode('/', Verta::getJalali($y, $m, $d));
}


function returnGregorian($JalaliDate, $delimiter)
{
    $bD = explode("$delimiter", $JalaliDate);
    $y = to_en_numbers($bD[0]);
    $m = to_en_numbers($bD[1]);
    $d = to_en_numbers($bD[2]);
    return implode('-', Verta::getGregorian($y, $m, $d));

}

function returnNumberFormat()
{

}


function to_en_numbers(string $string): string
{
    $persinaDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $persinaDigits2 = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    return str_replace($persinaDigits1, $persinaDigits2, $string);
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




