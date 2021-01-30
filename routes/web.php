<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\offlineClassController;
use App\Http\Controllers\onlineClassController;
use App\Http\Controllers\panelController;
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

Route::get('/d', [indexController::class, 'img']);

Route::get('/panel', function () {
    return response()->view('panel.home');
});

Route::prefix('/panel')->group(function () {
    Route::get('/online-request', [panelController::class, 'onlineRequest'])->name('panel.online-request');
    Route::get('/online-reserved', [panelController::class, 'onlineReserved'])->name('panel.online-reserved');
});

Route::get('/panel/editProfile', function () {
    return response()->view('panel.edit-profile');
});

/*  online class select   */
Route::prefix('/online')->group(function () {
    Route::get('/', [onlineClassController::class, 'index']);
    Route::post('/mobileHandle', [onlineClassController::class, 'mobileHandle']);
    Route::post('/check-verify-password', [onlineClassController::class, 'checkVerifyPassword']);
    Route::post('online-form', [onlineClassController::class, 'create'])->name('online-form');
});

Route::get('/', [indexController::class, 'index']);


/*   Auth routes  */
Route::get('register', [registerController::class, 'register']);
Route::post('register', [registerController::class, 'create']);
Route::post('/password-request',[registerController::class,'passwordRequest']);
Route::get('login', [loginController::class, 'login']);

// routes select online class
Route::prefix('/online')->group(function () {
    Route::post('/', [onlineClassController::class, 'index']);

});

Route::prefix('/offline')->group(function () {
    Route::post('/recordHandle', [offlineClassController::class, 'recordStepOne']);
});

