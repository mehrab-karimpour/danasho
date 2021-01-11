<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\offlineClassController;
use App\Http\Controllers\onlineClassController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// index page
Route::get('/', [indexController::class, 'index']);

Route::get('/s', [indexController::class, 'set']);


// routes select online class
Route::prefix('/online')->group(function () {
    Route::post('/GetGrades', [onlineClassController::class, 'getGrade']);
    Route::post('back', [onlineClassController::class, 'back']);
    Route::post('/getTime',[onlineClassController::class,'getTime']);
    Route::post('/getDate',[onlineClassController::class,'getDate']);
    Route::post('/recordHandle',[onlineClassController::class,'recordStepOneHandle']);
    Route::post('/descriptionHandle',[onlineClassController::class,'descriptionHandle']);
    Route::post('/recordNameMobile',[onlineClassController::class,'recordNameMobile']);
});

Route::prefix('/offline')->group(function () {
    Route::post('/recordHandle', [offlineClassController::class, 'recordStepOne']);
});

