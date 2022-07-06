<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/', function()  {
    return redirect('/login');
});

Route::get('/home', [PageController::class, 'home']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/user/new', [PageController::class, 'newUser']);
Route::post('/user/new', [PageController::class, 'newUser']);

Route::get('/user/edit', [UserController::class, 'editUser']);
Route::post('/user/edit', [UserController::class, 'editUser']);

Route::get('/user/delete', [UserController::class, 'deleteUser']);
Route::post('/user/delete', [UserController::class, 'deleteUser']);

Route::get('/user/profile', [PageController::class, 'userProfile']);
Route::get('/user/profile/{id}', [PageController::class, 'viewUser'])->where(['id'=>'[0-9]+']);

Route::get('/post/new', [PostController::class, 'newPost']);
Route::post('/post/new', [PostController::class, 'newPost']);
Route::get('/post/{id}', [PostController::class, 'viewPost'])->where(['id'=>'[0-9]+']);

Route::get('/logout', [AuthController::class, 'logout']);