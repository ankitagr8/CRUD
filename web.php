<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[App\Http\Controllers\UserController::class,'index']);

Route::post('savedata',[App\Http\Controllers\UserController::class,'demo']);

Route::get('editdata/{id}',[App\Http\Controllers\UserController::class,'edit']);

Route::post('updatedata',[App\Http\Controllers\UserController::class,'update']);