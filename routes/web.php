<?php

use App\Http\Controllers\Auth\OtpVerificationController;
use App\Http\Controllers\Auth\TeacherRegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register-teacher', [TeacherRegisterController::class, 'showForm'])->name('register.teacher');
Route::post('/register-teacher', [TeacherRegisterController::class, 'register'])->name('register.teacher.submit');

Route::get('/verify-otp', [OtpVerificationController::class, 'showForm'])->name('auth.verify.otp.form');
Route::post('/verify-otp', [OtpVerificationController::class, 'verifyOtp'])->name('auth.verify.otp.submit');