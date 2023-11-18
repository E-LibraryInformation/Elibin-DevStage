<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\PremiumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;
use App\Http\Controllers\ProfileController;
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
Route::get('/cariPenulis', [WriterController::class, 'index']);
Route::get('/writers', [WriterController::class, 'index']);
Route::get('/follower/{id}', [FollowController::class, 'followers']);
Route::get('/following/{id}', [FollowController::class, 'following']);

Route::get('/perpustakaan', [LibraryController::class, 'index']);
Route::get('/perpustakaan/information', [LibraryController::class, 'information']);
Route::get('/perpustakaan/librarians', [LibraryController::class, 'librarians']);
Route::get('/perpustakaan/cariPustakawan', [LibraryController::class, 'librarians']);
Route::get('/perpustakaan/information/log', [LibraryController::class, 'log']);
Route::get('/perpustakaan/information/libprofile', [LibraryController::class, 'library']);


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginApp']);
    Route::get('/registration', [AuthController::class, 'registration']);
    Route::post('/registration', [AuthController::class, 'createAccount']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index']);
    Route::post('/account', [AccountController::class, 'editProfile']);
    Route::get('/profile/{id}', [ProfileController::class, 'index']);
    Route::post('/follow/{id}', [UserController::class, 'follow'])->name('follow');
    // Route::post('/unfollow/{id}', [UserController::class, 'unfollow'])->name('unfollow');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/blacklist/{id}', [BookController::class, 'blacklist']);
    Route::get('/books/blacklist/{id}', [BlacklistController::class, 'index']);
    Route::post('/unblacklist/{id}', [BookController::class, 'unblacklist']);
    Route::get('/books/bookmark/{id}', [BookmarkController::class, 'index']);
    Route::post('/bookmark/{id}', [BookController::class, 'bookmark']);
    Route::post('/unbookmark/{id}', [BookController::class, 'unbookmark']);
    Route::get('/upgrade', [PremiumController::class, 'index']);
    Route::get('/books/borrow/{id}', [BookController::class , 'borrow']);
    Route::post('/books/borrow/{id}', [BookController::class , 'borrowStore']);

    // Rute akses Admin & Librarians
    Route::get('/staff', [StaffController::class, 'index']);
    // -----------------------------

    // Rute akses khusus Librarians
    Route::get('/staff/librarians', [LibrarianController::class, 'index']);
    Route::get('/staff/librarians/borrowing', [LibrarianController::class, 'borrowing']);
    Route::post('/confirmBorrow/{id}', [LibrarianController::class, 'confirmBorrow']);
    Route::get('/staff/librarians/borrowed', [LibrarianController::class, 'borrowed']);
    Route::post('/confirmEnd/{id}', [LibrarianController::class, 'confirmEnd']);
    Route::get('/staff/librarians/books', [LibrarianController::class, 'books']);
    Route::get('/staff/librarians/books/create', [LibrarianController::class, 'create']);
    Route::post('/staff/librarians/books/create', [LibrarianController::class, 'store']);
    Route::get('/staff/librarians/books/edit/{id}', [LibrarianController::class, 'edit']);
    Route::put('/staff/librarians/books/edit/{id}', [LibrarianController::class, 'update']);
    Route::get('/staff/librarians/books/delete/{id}', [LibrarianController::class, 'destroy']);
    // ----------------------------

    // Rute akses khusus Admin
    Route::get('/staff/admin', [AdminController::class, 'index']);
    Route::get('/staff/admin/users', [AdminController::class, 'users']);
    Route::get('/staff/admin/admin', [AdminController::class, 'admin']);
    Route::get('/staff/admin/librarians', [AdminController::class, 'librarians']);
    Route::get('/staff/admin/writers', [AdminController::class, 'writers']);
    Route::get('/staff/admin/library', [AdminController::class, 'library']);
    Route::put('/staff/admin/library/{id}', [AdminController::class, 'update']);
    // -----------------------

});

