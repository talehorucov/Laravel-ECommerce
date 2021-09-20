<?php

use Database\Factories\AdminFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware(['auth:sanctum,admin', 'verified'])->group(function () {
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/change/password', [AdminProfileController::class, 'change_password'])->name('admin.change.password');
    Route::post('/update/password', [AdminProfileController::class, 'update_password'])->name('update.change.password');
    
    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminProfileController::class, 'index'])->name('admin.profile');
        Route::get('/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::post('/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    });
});

Route::middleware('admin:admin')->prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,web', 'verified'])->group(function () {
    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');

    Route::prefix('user')->group(function () {
        Route::get('/profile', [IndexController::class, 'user_profile'])->name('user.profile');
        Route::post('/profile/update', [IndexController::class, 'user_update'])->name('user.update');
        Route::get('/change/password', [IndexController::class, 'change_password'])->name('change.password');
        Route::post('/update/password', [IndexController::class, 'update_password'])->name('update.password');
    });
});


Route::redirect('/web/dashboard', '/dashboard', 301);

/////CHANGE PASSWORD
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/logout', [IndexController::class, 'log_out'])->name('user.logout');
    