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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('questions', 'App\Http\Controllers\QuestionController@index');
Route::post('questions', 'App\Http\Controllers\QuestionController@store');
Route::get('questions/{question}', 'App\Http\Controllers\QuestionController@show');
Route::put('questions/{question}', 'App\Http\Controllers\QuestionController@update');
Route::delete('questions/{question}', 'App\Http\Controllers\QuestionController@delete');