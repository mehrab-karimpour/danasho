<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\fileController;
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

Route::get('/d', [onlineClassController::class, 'getPass']);


Route::prefix('/panel')->middleware('auth')->group(function () {
    Route::get('/', [panelController::class, 'home'])->name('panel.home');
    Route::get('/online-request', [panelController::class, 'onlineRequest']);
    Route::get('/online-reserved', [panelController::class, 'onlineReserved']);
    Route::get('/edit-profile', [panelController::class, 'editProfile'])->name('panel.edit-profile');
    Route::post('/edit-profile', [panelController::class, 'updateProfile'])->name('panel.edit-profile-form');
    Route::post('/upload-image-profile', [panelController::class, 'uploadImageProfile']);
});


/*  online class select   */
Route::prefix('/online')->group(function () {
    Route::get('/', [onlineClassController::class, 'index']);
    Route::post('/getDates', [onlineClassController::class, 'getDates']);
    Route::post('/mobileHandle', [onlineClassController::class, 'mobileHandle']);
    Route::post('/check-verify-password', [onlineClassController::class, 'checkVerifyPassword']);
    Route::post('online-form', [onlineClassController::class, 'create'])->name('online-form');
});

Route::get('/', [indexController::class, 'index']);


/*   Auth routes  */
Route::get('register', [registerController::class, 'register'])->name('register');
Route::post('register', [registerController::class, 'create']);
Route::post('/password-request', [registerController::class, 'passwordRequest']);
Route::get('login', [loginController::class, 'login'])->name('login');
Route::post('login', [loginController::class, 'doLogin']);
Route::get('/logout',[loginController::class,'logOut']);

// routes select online class
Route::prefix('/online')->group(function () {
    Route::post('/', [onlineClassController::class, 'index']);

});

Route::prefix('/offline')->group(function () {
    Route::post('/recordHandle', [offlineClassController::class, 'recordStepOne']);
});


/*  files section    */

Route::get('/files/{img_name}',[fileController::class,'getFile']);

