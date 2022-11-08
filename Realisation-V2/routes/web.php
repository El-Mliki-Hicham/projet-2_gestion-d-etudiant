<?php

use App\Http\Controllers\PromotionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|dd
*/


Route::get('index',[PromotionController::class,'index']);
Route::get('create',[PromotionController::class,'create']);
Route::post('Add',[PromotionController::class,'store']);
Route::get('Edit/{id}',[PromotionController::class,'Edit']);
Route::get('Delete/{id}',[PromotionController::class,'Delete']);
Route::post('Update/{id}',[PromotionController::class,'Update']);
Route::get('search',[PromotionController::class,'search']);

