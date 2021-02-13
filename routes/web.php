<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\offlineClassController;
use App\Http\Controllers\onlineClassController;
use App\Http\Controllers\panelController;
use App\Http\Controllers\ticketController;
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
    Route::get('/online-reserved', [panelController::class, 'onlineReserved'])->name('panel.online-reserved');
    Route::get('/online-held', [panelController::class, 'onlineHeld'])->name('panel.online-held');
    Route::get('/online-create', [panelController::class, 'onlineRequest'])->name('panel.online-create');
    Route::get('/edit-profile', [panelController::class, 'editProfile'])->name('panel.edit-profile');
    Route::post('/edit-profile', [panelController::class, 'updateProfile'])->name('panel.edit-profile-form');
    Route::post('/upload-image-profile', [panelController::class, 'uploadImageProfile']);
    Route::get('/new-ticket', [ticketController::class, 'newTicket'])->name('panel.new-ticket');
    Route::post('/new-ticket', [ticketController::class, 'create']);
    Route::get('/list-tickets', [ticketController::class, 'listTickets'])->name('panel.list-tickets');
    Route::get('/show-ticket/{id}',[ticketController::class,'showTicket'])->name('panel.show.ticket');
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
    // Route::post('/mobileHandle', [onlineClassController::class, 'mobileHandle']);
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
Route::get('/logout', [loginController::class, 'logOut']);


Route::prefix('/offline')->group(function () {
    Route::post('/recordHandle', [offlineClassController::class, 'recordStepOne']);
});


/*  files section    */

Route::get('/files/{img_name}', [fileController::class, 'getFile']);

