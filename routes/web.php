<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get("/", [PostController::class, "index"])->name("home");
Route::get("/dashboard", [PostController::class, "posts"])->middleware(["auth", "verified"])->name("dashboard");
Route::get('/posts/create', [PostController::class, 'create'])->middleware(['auth', 'verified'])->name('post-create');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('post-show');
Route::post('/posts', [PostController::class, 'store']);
Route::get('posts/edit/{slug}', [PostController::class, 'edit'])->middleware(['auth', 'verified'])->name('edit-post');
Route::post('/posts/update', [PostController::class, 'update']);
Route::post('/comments', [CommentController::class, 'store']);
Route::middleware('auth')->group(function () {
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::get('/verify-email', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('/email/verification-notification', [AuthController::class, 'sendEmailVerification'])->middleware('auth')->name('verification.send');

