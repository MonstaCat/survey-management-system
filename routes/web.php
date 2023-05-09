<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SurveyResultController;
use App\Http\Controllers\CategoryController;

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

//admin
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    // Admin question route
    Route::get('/question', [AdminController::class, 'question'])->name('admin.question');
    Route::get('/add_question', [AdminController::class, 'question_add'])->name('question.add');
    Route::post('/store_question', [AdminController::class, 'question_store'])->name('question.store');
    Route::get('/question/{question}', [AdminController::class, 'question_update'])->name('admin.question.update');
    Route::post('/question/{question}', [AdminController::class, 'question_put'])->name('question.update');
    Route::get('/question/delete/{question}', [AdminController::class, 'question_delete'])->name('question.delete');
    Route::post('/add_answer', [AdminController::class, 'answer_add'])->name('answer.add');
    Route::post('/update/{question}', [AdminController::class, 'answer_update'])->name('answer.update');
    Route::post('/delete/{question}', [AdminController::class, 'answer_delete'])->name('answer.delete');
    // Admin question category
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/add_category', [CategoryController::class, 'add'])->name('category.add');
    Route::post('/store_category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/delete/{category}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    // Admin dashboard route
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // Admin users route
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/user/delete/{id}', [AdminController::class, 'user_delete'])->name('admin.users.delete');
    // Admin respondents route
    Route::get('/respondents', [SurveyResultController::class, 'index'])->name('admin.respondents');
    Route::get('/result/delete/{id}', [SurveyResultController::class, 'result_delete'])->name('result.delete');
    Route::post('/submit', [SurveyResultController::class, 'store'])->name('survey.submit');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'LoginWithGoogle'])->name('login.google');
Route::get('/auth/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'GoogleCallback']);
