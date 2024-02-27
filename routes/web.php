<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

// user controllers
Route::get('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [UserController::class, 'process']);
Route::post('/logout', [UserController::class, 'logout']);

// store
Route::post('/store', [UserController::class, 'store']);

// student controllers
Route::get('/', [StudentController::class, 'index'])->middleware('auth');
Route::get('/add/student', [StudentController::class, 'create'])->middleware('auth');
Route::post('/add/student', [StudentController::class, 'store']);
Route::get('/student/{id}', [StudentController::class, 'show'])->middleware('auth');
Route::put('/student/{student}', [StudentController::class, 'update'])->middleware('auth');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->middleware('auth');
