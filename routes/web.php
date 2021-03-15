<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\offlineClassController;
use App\Http\Controllers\onlineClassController;
use App\Http\Controllers\panelController;
use App\Http\Controllers\ticketController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
Route::get('/d', [onlineClassController::class, 'getPass']);
Route::get('/test', [onlineClassController::class, 'professorSelected']);


Route::prefix('/panel')->middleware('auth')->group(function () {
    Route::get('/', [panelController::class, 'home'])->name('panel.home');
    // online
    Route::get('/online-reserved', [panelController::class, 'onlineReserved'])->name('panel.online-reserved');
    Route::get('/online-held', [panelController::class, 'onlineHeld'])->name('panel.online-held');
    Route::get('/online-create', [panelController::class, 'onlineRequest'])->name('panel.online-create');
    // TODO: Teaching Status
    Route::get('online-select-teaching', [panelController::class, 'onlineSelectTeaching'])->name('panel.online-select-teaching');
    Route::post('online-select-teaching', [panelController::class, 'onlineSelectTeachingRecord'])->name('panel.online-select-teaching-record');
    Route::get('/teaching-dates', [panelController::class, 'selectTeachingDates'])->name('panel.select-teaching-dates');
    Route::post('/teaching-dates', [panelController::class, 'updateTeachingDates'])->name('panel.update-teaching-dates');
    Route::get('/get-student-status', [panelController::class, 'getStudentStatus'])->name('panel.online-get-student-status');
    Route::post('/get-student-status', [panelController::class, 'getStudentUpdate']);

    // profile
    Route::get('/edit-profile', [panelController::class, 'editProfile'])->name('panel.edit-profile');
    Route::post('/edit-profile-professor', [panelController::class, 'editProfileProfessor'])
        ->name('panel.edit-profile-professor');
    Route::post('/edit-profile', [panelController::class, 'updateProfile'])->name('panel.edit-profile-form');
    Route::post('/upload-image-profile', [panelController::class, 'uploadImageProfile']);
    // ticket
    Route::get('/new-ticket', [ticketController::class, 'newTicket'])->name('panel.new-ticket');
    Route::post('/new-ticket', [ticketController::class, 'create']);
    Route::get('/list-tickets', [ticketController::class, 'listTickets'])->name('panel.list-tickets');
    Route::get('/show-ticket/{id}', [ticketController::class, 'showTicket'])->name('panel.show.ticket');
    Route::post('/show-ticket', [ticketController::class, 'sendTicket'])->name('panel.send.message');
    // credit
    Route::get('/increase-credit', [panelController::class, 'increaseCredit'])->name('panel.increase.credit');

});


/*  online class section   */
Route::prefix('/online')->group(function () {
    Route::post('/', [onlineClassController::class, 'index']);
    Route::post('/getDates', [onlineClassController::class, 'getDates']);
    Route::post('/mobileHandle', [onlineClassController::class, 'mobileHandle']);
    Route::post('/check-verify-password', [onlineClassController::class, 'checkVerifyPassword']);
    Route::post('online-form', [onlineClassController::class, 'create'])->name('online-form');
});

/*  offline class section      */
Route::prefix('/offline')->group(function () {
    Route::post('/', [offlineClassController::class, 'index']);
    // Route::post('/getDates', [onlineClassController::class, 'getDates']);
    Route::post('/mobileHandle', [offlineClassController::class, 'mobileHandle']);
    // Route::post('/check-verify-password', [onlineClassController::class, 'checkVerifyPassword']);
    // Route::post('online-form', [onlineClassController::class, 'create'])->name('online-form');
});


Route::get('/', [indexController::class, 'index']);


/*   Auth routes  */
Route::get('register', [registerController::class, 'register'])->name('register');
Route::post('register', [registerController::class, 'create']);
Route::post('/password-request', [registerController::class, 'passwordRequest']);
Route::get('login', [loginController::class, 'login'])->name('login');
Route::post('login', [loginController::class, 'doLogin']);
Route::post('/recovery-password', [loginController::class, 'recoveryPassword']);
Route::post('/recovery-password-check-verify', [loginController::class, 'recoveryPasswordCheckVerify']);
Route::get('/logout', [loginController::class, 'logOut']);


Route::prefix('/offline')->group(function () {
    Route::post('/recordHandle', [offlineClassController::class, 'recordStepOne']);
});


/*  files section    */

Route::get('/files/{img_name}', [fileController::class, 'getFile']);

