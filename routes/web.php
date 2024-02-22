<?php

use App\Http\Controllers\MjuStudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/MjuStudent',[MjuStudentController::class,'index']);

Route::get('/Product',[ProductController::class,'index']);

Route::delete('/User',[UserController::class,'index']);
