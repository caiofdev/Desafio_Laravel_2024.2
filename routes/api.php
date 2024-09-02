<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/manager', 'App\Http\Controllers\Api\ManagerController@index');
Route::get('/admin', 'App\Http\Controllers\Api\AdminController@index');
