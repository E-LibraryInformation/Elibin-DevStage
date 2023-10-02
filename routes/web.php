<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'detail']);
Route::get('/cariBuku', [BookController::class, 'cariBuku']);
Route::get('/writers', [WriterController::class, 'index']);
Route::get('/writer/{id}', [WriterController::class, 'detail']);


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'loginApp']);
    Route::get('/registration', [AuthController::class, 'registration']);
    Route::post('/registration', [AuthController::class, 'createAccount']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index']);
    Route::post('profile', [ProfileController::class, 'editProfile']);
    Route::post('/follow/{id}', [UserController::class, 'follow'])->name('follow');
    // Route::post('/unfollow/{id}', [UserController::class, 'unfollow'])->name('unfollow');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

