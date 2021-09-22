<?php

use Database\Factories\AdminFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->middleware(['auth:sanctum,admin', 'verified'])->group(function () {

    // Indexes
    Route::get('/brands', [BrandController::class, 'index'])->name('admin.brands');
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories');
    // End Of Indexes

    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/change/password', [AdminProfileController::class, 'change_password'])->name('admin.change.password');
    Route::post('/update/password', [AdminProfileController::class, 'update_password'])->name('update.change.password');

    Route::prefix('profile')->group(function () {
        Route::get('/', [AdminProfileController::class, 'index'])->name('admin.profile');
        Route::get('/edit', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::post('/update', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    });

    Route::prefix('brand')->group(function () {
        Route::post('/create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('/update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.delete');
    });

    Route::prefix('category')->group(function () {
        Route::post('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

        Route::prefix('sub')->group(function () {
            Route::get('/', [SubCategoryController::class, 'index'])->name('admin.subcategories');
            Route::post('/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
            Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
            Route::post('/update/{id}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
            Route::get('/delete/{id}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.delete');

            Route::prefix('sub')->group(function () {
                Route::get('/', [SubCategoryController::class, 'sub_index'])->name('admin.subsubcategories');
                Route::get('/ajax/{category_id}', [SubCategoryController::class, 'get_subcategory']);
                Route::post('/create', [SubCategoryController::class, 'sub_create'])->name('admin.subsubcategory.create');
                Route::get('/edit/{id}', [SubCategoryController::class, 'sub_edit'])->name('admin.subsubcategory.edit');
                Route::post('/update/{id}', [SubCategoryController::class, 'sub_update'])->name('admin.subsubcategory.update');
                Route::get('/delete/{id}', [SubCategoryController::class, 'sub_destroy'])->name('admin.subsubcategory.delete');
            });
        });
    });
});

Route::middleware('admin:admin')->prefix('admin')->group(function () {
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/logout', [IndexController::class, 'log_out'])->name('user.logout');
