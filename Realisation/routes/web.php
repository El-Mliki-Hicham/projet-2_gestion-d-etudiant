<?php

use App\Http\Controllers\PromotionController;
use App\Http\Controllers\StudentsController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[PromotionController::class,'index']);
Route::get('/create',[PromotionController::class,'create']);
Route::post('/store',[PromotionController::class,'store']);
Route::get('/Edit/{id}',[PromotionController::class,'edit']);
Route::post('/update/{id}',[PromotionController::class,'update']);
Route::get('/Delete/{id}',[PromotionController::class,'delete']);

Route::get('/student/index',[StudentsController::class,'index']);
Route::get('/student/create/{id}',[StudentsController::class,'create']);
Route::post('/student/store',[StudentsController::class,'store']);
Route::get('/student/Edit/{id}',[StudentsController::class,'edit']);
Route::post('/student/update/{id}',[StudentsController::class,'update']);
Route::get('/student/Delete/{id}/{iid}',[StudentsController::class,'destroy']);

