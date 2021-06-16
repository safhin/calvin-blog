<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Frontend\PostController as FrontendPostController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\CommentController;
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



Route::get('/', [FrontendPostController::class, 'index'])->name('home');
Route::get('/post/{slug}', [FrontendPostController::class, 'singlePost'])->name('post');
Route::get('/about', [FrontendPostController::class, 'about'])->name('about');
Route::get('/contact', [FrontendPostController::class, 'contact'])->name('contact');
Route::post('/posts/{post_id}/comments', [CommentController::class, 'store'])->name('comment.store');
Route::get('/category/{category_url}', [FrontendCategoryController::class, 'show'])->name('category.show');



Route::prefix('admin')->group(function () {
    Route::get('/register', [RegistrationController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [RegistrationController::class, 'register']);

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', [PasswordResetController::class, 'forgotPasswordform'])->middleware('guest')->name('forgotPassword');
    Route::post('/forgot-password', [PasswordResetController::class, 'forgotPassword'])->middleware('guest')->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'resetPasswordForm'])->middleware('guest')->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->middleware('guest')->name('password.update');


    Route::get('/users', [UserController::class, 'show'])->name('users');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/approval', [DashboardController::class,'approval'])->name('approval');
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts', PostController::class);

    Route::middleware(['approved'])->group(function () {
        Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/{user_id}/approve', [UserController::class, 'approve'])->name('admin.users.approve');
    });
});