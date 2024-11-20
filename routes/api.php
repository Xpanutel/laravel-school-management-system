<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;

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
Route::post('/reg', [UserController::class, 'reg']);
Route::post('/login', [UserController::class, 'login']);
Route::delete('/deleteuser/{id}', [UserController::class, 'delete']);
Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'user']);



// Роуты для студента

// Получение списка всех студентов
Route::get('/students', [StudentController::class, 'index']);

// Получение конкретного студента по ID
Route::get('/student/{id}', [StudentController::class, 'show']);

// Создание нового студента
Route::post('/student', [StudentController::class, 'store']);

// Обновление данных студента
Route::put('/student/{id}', [StudentController::class, 'update']);

// Удаление студента
Route::delete('/student/{id}', [StudentController::class, 'destroy']);



// Учитель
Route::post('/addteacher', [TeacherController::class, 'add']);
Route::get('/teacher/{id}', [TeacherController::class, 'getbyid']);
Route::get('/teachers', [TeacherController::class, 'getll']);
Route::delete('/deleteteacher/{id}', [TeacherController::class, 'delete']);