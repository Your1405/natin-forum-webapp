<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;

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
Route::get('/user/profile', [PageController::class, 'userProfile']);

Route::get('/post/new', [PostController::class, 'newPost']);

Route::get('/logout', [AuthController::class, 'logout']);