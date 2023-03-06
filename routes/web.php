<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RentLogController;
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

// Cannot visit welcome if not login yet (Session)
Route::get('/', [PublicController::class, 'index']);

// Session/ middleware
Route::middleware('only_guest')->group(function() {
    // URL to login page
    Route::get('login', [AuthController::class, 'login'])->name('login');

    // URL route login processing
    Route::post('login', [AuthController::class, 'authenticating']);

    // URL to Register page
    Route::get('register', [AuthController::class, 'register']);

    // URL register processing
    Route::post('register', [AuthController::class, 'registerProcess']);

});

// Session middleware auth
Route::middleware('auth')->group(function() {

    // URL route to profile page
    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    // Session untuk Logout
    Route::get('logout', [AuthController::class, 'logout']);

    Route::middleware('only_admin')->group(function() {

        // URL route to dashboard page
        Route::get('dashboard', [DashboardController::class, 'index']);

        // URL to Books page
        Route::get('books', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::post('book-edit/{slug}', [BookController::class, 'update']);
        Route::get('book-delete/{slug}', [BookController::class, 'delete']);
        Route::get('book-destroy/{slug}', [BookController::class, 'destroy']);
        Route::get('book-deleted-list', [BookController::class, 'deletedBookList']);
        Route::get('book-restore/{slug}', [BookController::class, 'restore']);

        // URL to Categories page
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add',[CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category-delete/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy']);
        Route::get('category-deleted-list', [CategoryController::class, 'deletedCategoryList']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

        // URL to Categories page
        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user-ban/{slug}', [UserController::class, 'ban']);
        Route::get('user-destroy/{slug}', [UserController::class, 'destroy']);
        Route::get('banned-list', [UserController::class, 'bannedList']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        // Book Rent page
        Route::get('book-rent', [BookRentController::class, 'index']);
        Route::post('book-rent', [BookRentController::class, 'store']);

        // URL to Rent Logs page
        Route::get('rent-logs', [RentLogController::class, 'index']);

        Route::get('book-return', [BookRentController::class, 'returnBook']);
        Route::post('book-return', [BookRentController::class, 'saveReturnBook']);

    });

});


