<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Пользователь
Route::post('/reg', [UserController::class, 'registerUser']);
Route::post('/login', [UserController::class, 'loginUser']);
Route::delete('/deleteuser/{id}', [UserController::class, 'deleteUser']);
Route::middleware('auth:sanctum')->get('/profile', [UserController::class, 'profileUser']);

// Студент
Route::post('/addstudent', [StudentController::class, 'addStudent']);
Route::delete('/deletestudent/{id}', [StudentController::class, 'deleteStudent']);
Route::get('/student/{id}', [StudentController::class, 'profileStudent']);