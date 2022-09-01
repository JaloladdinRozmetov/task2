<?php

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

//Route::get('/', function () {
//    return view('message');
//});


Route::get('/',[App\Http\Controllers\MessageController::class,'index'])->name('index');
Route::post('/message',[App\Http\Controllers\MessageController::class,'store'])->name('message-store');
