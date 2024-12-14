<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\DashboardController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\SubmitSubmissionController;
// use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/{id}', [CourseController::class, 'show']);


Route::post('/join-course', [CourseController::class, 'join']);
Route::post('/leave-course', [CourseController::class, 'leave']);

Route::get('/submit-submission', [SubmitSubmissionController::class, "index"]);
Route::post('/submit-submission', [SubmitSubmissionController::class, "submit"]);

Route::get('/dashboard', DashboardController::class);

