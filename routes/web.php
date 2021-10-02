<?php

use Database\Factories\AdminFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\HomeController;

Route::prefix('admin')->middleware(['auth:admin', 'verified'])->group(function () {

    // Indexes
    Route::get('/brands', [BrandController::class, 'index'])->name('admin.brand.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/sliders', [SliderController::class, 'index'])->name('admin.slider.index');
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


    //------------------------Admin Brand ------------------------
    Route::prefix('brand')->group(function () {
        Route::post('/create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::get('/edit/{slug}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('/update/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::get('/delete/{brand}', [BrandController::class, 'destroy'])->name('admin.brand.delete');
    });


    //------------------------Admin Category ------------------------
    Route::prefix('category')->group(function () {
        Route::post('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::get('/edit/{slug}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.category.delete');


        //------------------------Admin SubCategory ------------------------
        Route::prefix('sub')->group(function () {
            Route::get('/', [SubCategoryController::class, 'index'])->name('admin.subcategories');
            Route::post('/create', [SubCategoryController::class, 'create'])->name('admin.subcategory.create');
            Route::get('/ajax/{category_id}', [SubCategoryController::class, 'get_subcategory']);
            Route::get('/edit/{slug}', [SubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
            Route::post('/update/{subcategory}', [SubCategoryController::class, 'update'])->name('admin.subcategory.update');
            Route::get('/delete/{subcategory}', [SubCategoryController::class, 'destroy'])->name('admin.subcategory.delete');


            //------------------------Admin Sub->SubCategory ------------------------
            Route::prefix('sub')->group(function () {
                Route::get('/', [SubCategoryController::class, 'sub_index'])->name('admin.subsubcategories');
                Route::get('/ajax/{subcategory_id}', [SubCategoryController::class, 'get_subsubcategory']);
                Route::post('/create', [SubCategoryController::class, 'sub_create'])->name('admin.subsubcategory.create');
                Route::get('/edit/{slug}', [SubCategoryController::class, 'sub_edit'])->name('admin.subsubcategory.edit');
                Route::post('/update/{subsubcategory}', [SubCategoryController::class, 'sub_update'])->name('admin.subsubcategory.update');
                Route::get('/delete/{subsubcategory}', [SubCategoryController::class, 'sub_destroy'])->name('admin.subsubcategory.delete');
            });
        });
    });


    //------------------------Admin Product ------------------------
    Route::prefix('product')->group(function () {
        Route::get('/add', [ProductController::class, 'add'])->name('admin.product.add');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::get('/delete/{product}', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/detail/{slug}', [ProductController::class, 'detail'])->name('admin.product.info');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::post('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/images/update', [ProductController::class, 'update_images'])->name('admin.product.images.update');
        Route::post('/thumbnail/update/{id}', [ProductController::class, 'update_thumbnail'])->name('admin.product.thumbnail.update');
        Route::get('/images/delete/{multi_images}', [ProductController::class, 'delete_images'])->name('admin.product.image.delete');
        Route::get('/active/{product}', [ProductController::class, 'product_active'])->name('admin.product.active');
        Route::get('/inactive/{product}', [ProductController::class, 'product_inactive'])->name('admin.product.inactive');
    });


    //------------------------Admin Slider ------------------------
    Route::prefix('slider')->group(function () {
        Route::post('/create', [SliderController::class, 'create'])->name('admin.slider.create');
        Route::get('/edit/{slider}', [SliderController::class, 'edit'])->name('admin.slider.edit');
        Route::post('/update/{slider}', [SliderController::class, 'update'])->name('admin.slider.update');
        Route::get('/delete/{slider}', [SliderController::class, 'delete'])->name('admin.slider.delete');
        Route::get('/active/{slider}', [SliderController::class, 'slider_active'])->name('admin.slider.active');
        Route::get('/inactive/{slider}', [SliderController::class, 'slider_inactive'])->name('admin.slider.inactive');
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

    Route::get('/product/detail/{slug}',[HomeController::class,'product_detail'])->name('user.product.detail');
    Route::get('/tags/{tag}',[HomeController::class,'tags'])->name('user.tags');

Route::redirect('/web/dashboard', '/dashboard', 301);


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/logout', [IndexController::class, 'log_out'])->name('user.logout');
