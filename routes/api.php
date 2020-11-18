<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::apiResource('products', \App\Http\Controllers\ProductController::class);

//Route::apiResource('user', \App\Http\Controllers\Re)


Route::apiResource('tags', \App\Http\Controllers\TagsController::class);
