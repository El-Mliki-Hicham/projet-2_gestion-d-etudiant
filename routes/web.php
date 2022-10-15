<?php

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
Route::get('index',[StudentsController::class,"index"]);
Route::get('Add',[StudentsController::class,"create"]);
Route::post('AddStudent',[StudentsController::class,"AddStudent"]);
Route::get('Edit/{id}',[StudentsController::class,"EditStudent"]);
Route::post('Update/{id}',[StudentsController::class,"UpdateStudent"]);
