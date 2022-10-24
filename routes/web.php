<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

//Show add article Form
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('auth');

//Store an article
Route::post('/articles', [ArticleController::class, 'store'])->middleware('auth');

Route::post('/upload', [\App\Http\Controllers\EditorController::class, 'uploadimage'])
    ->name('ckeditor.upload');


//Show login Form
Route::get('/login', [UserController::class, 'login'])->name('login');

//Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
