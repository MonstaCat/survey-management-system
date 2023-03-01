<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SurveyResultController;

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
    return redirect('/home');
});

// Admin Routes
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin/question', [AdminController::class, 'question'])->name('admin.question');
Route::get('admin/add_question', [AdminController::class, 'question_add'])->name('question.add');
Route::post('admin/store_question', [AdminController::class, 'question_store'])->name('question.store');
Route::get('/admin/question/{question}', [AdminController::class, 'question_update'])->name('admin.question.update');
Route::post('admin/question/{question}', [AdminController::class, 'question_put'])->name('question.update');
Route::get('admin/question/delete/{question}', [AdminController::class, 'question_delete'])->name('question.delete');
Route::post('admin/add_answer', [AdminController::class, 'answer_add'])->name('answer.add');
Route::post('admin/update/{question}', [AdminController::class, 'answer_update'])->name('answer.update');
Route::post('admin/delete/{question}', [AdminController::class, 'answer_delete'])->name('answer.delete');

Route::get('/admin/respondents', [SurveyResultController::class, 'index'])->name('admin.respondents');
Route::get('/survey/submit', [SurveyResultController::class, 'store'])->name('survey.submit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'LoginWithGoogle'])->name('login.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'GoogleCallback']);
