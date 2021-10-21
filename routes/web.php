<?php

use Database\Factories\AdminFactory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AddressController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController as BackendOrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\Frontend\OrderDetailController;
use App\Models\Order;

Route::prefix('admin')->middleware(['auth:admin', 'verified'])->group(function () {
Route::group(['as' => 'admin.'], function () {    
    // Indexes
    Route::get('/brands', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/colors', [ColorController::class, 'index'])->name('color.index');
    Route::get('/sizes', [SizeController::class, 'index'])->name('size.index');
    Route::get('/tags', [TagController::class, 'index'])->name('tag.index');
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/sliders', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/coupons', [CouponController::class, 'index'])->name('coupon.index');
    Route::get('/cities', [CityController::class, 'index'])->name('city.index');
    Route::get('/users', [AdminProfileController::class, 'users'])->name('user.index');
    Route::get('/setting/site', [SiteSettingController::class, 'site_setting'])->name('setting.index');
    // End Of Indexes
});


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


    //------------------------Admin Color ------------------------
    Route::prefix('color')->group(function () {
        Route::post('/create', [ColorController::class, 'create'])->name('admin.color.create');
        Route::get('/edit/{color}', [ColorController::class, 'edit'])->name('admin.color.edit');
        Route::post('/update/{color}', [ColorController::class, 'update'])->name('admin.color.update');
        Route::get('/delete/{color}', [ColorController::class, 'destroy'])->name('admin.color.delete');
    });


    //------------------------Admin Size ------------------------
    Route::prefix('size')->group(function () {
        Route::post('/create', [SizeController::class, 'create'])->name('admin.size.create');
        Route::get('/edit/{size}', [SizeController::class, 'edit'])->name('admin.size.edit');
        Route::post('/update/{size}', [SizeController::class, 'update'])->name('admin.size.update');
        Route::get('/delete/{size}', [SizeController::class, 'destroy'])->name('admin.size.delete');
    });


    //------------------------Admin Tag ------------------------
    Route::prefix('tag')->group(function () {
        Route::post('/create', [TagController::class, 'create'])->name('admin.tag.create');
        Route::get('/edit/{tag}', [TagController::class, 'edit'])->name('admin.tag.edit');
        Route::post('/update/{tag}', [TagController::class, 'update'])->name('admin.tag.update');
        Route::get('/delete/{tag}', [TagController::class, 'destroy'])->name('admin.tag.delete');
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


    //------------------------Admin Coupon ------------------------
    Route::prefix('coupon')->group(function () {
        Route::post('/create', [CouponController::class, 'create'])->name('admin.coupon.create');
        Route::get('/edit/{coupon}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
        Route::post('/update/{coupon}', [CouponController::class, 'update'])->name('admin.coupon.update');
        Route::get('/delete/{coupon}', [CouponController::class, 'delete'])->name('admin.coupon.delete');
        Route::get('/active/{coupon}', [CouponController::class, 'coupon_active'])->name('admin.coupon.active');
        Route::get('/inactive/{coupon}', [CouponController::class, 'coupon_inactive'])->name('admin.coupon.inactive');
    });

    //------------------------Admin Shipping City------------------------
    Route::prefix('city')->group(function () {
        Route::post('/create', [CityController::class, 'create'])->name('admin.city.create');
        Route::get('/edit/{city}', [CityController::class, 'edit'])->name('admin.city.edit');
        Route::post('/update/{city}', [CityController::class, 'update'])->name('admin.city.update');
        Route::get('/delete/{city}', [CityController::class, 'delete'])->name('admin.city.delete');
    });

    //------------------------Admin Orders------------------------
    Route::prefix('order')->group(function () {
        Route::group(['as' => 'admin.'], function () {
            Route::get('/pending', [BackendOrderController::class, 'pending_orders'])->name('pending.order');
            Route::get('/confirmed', [BackendOrderController::class, 'confirmed_orders'])->name('confirmed.order');
            Route::get('/processing', [BackendOrderController::class, 'processing_orders'])->name('processing.order');
            Route::get('/picked', [BackendOrderController::class, 'picked_orders'])->name('picked.order');
            Route::get('/shipped', [BackendOrderController::class, 'shipped_orders'])->name('shipped.order');
            Route::get('/delivered', [BackendOrderController::class, 'delivered_orders'])->name('delivered.order');
            Route::get('/cancel', [BackendOrderController::class, 'cancel_orders'])->name('cancel.order');
            Route::get('/{order_number}/detail', [BackendOrderController::class, 'order_details'])->name('order.detail');
        });

        //------------------------Admin Update Order Status------------------------
        Route::get('/change/pending-to-confirm/{order_number}', [BackendOrderController::class, 'pending_to_confirm'])->name('pending_to_confirm');
        Route::get('/change/confirm-to-processing/{order_number}', [BackendOrderController::class, 'confirm_to_processing'])->name('confirm_to_processing');
        Route::get('/change/processing-to-picked/{order_number}', [BackendOrderController::class, 'processing_to_picked'])->name('processing_to_picked');
        Route::get('/change/picked-to-shipped/{order_number}', [BackendOrderController::class, 'picked_to_shipped'])->name('picked_to_shipped');
        Route::get('/change/shipped-to-delivered/{order_number}', [BackendOrderController::class, 'shipped_to_delivered'])->name('shipped_to_delivered');
    });


    //------------------------Admin Site Settings ------------------------
    Route::prefix('setting')->group(function () {
        Route::POST('/update/{site_setting}', [SiteSettingController::class, 'update'])->name('update.site.setting');
        // Route::post('/create', [CouponController::class, 'create'])->name('admin.coupon.create');
        // Route::get('/edit/{coupon}', [CouponController::class, 'edit'])->name('admin.coupon.edit');
        // Route::post('/update/{coupon}', [CouponController::class, 'update'])->name('admin.coupon.update');
        // Route::get('/delete/{coupon}', [CouponController::class, 'delete'])->name('admin.coupon.delete');
        // Route::get('/active/{coupon}', [CouponController::class, 'coupon_active'])->name('admin.coupon.active');
        // Route::get('/inactive/{coupon}', [CouponController::class, 'coupon_inactive'])->name('admin.coupon.inactive');
    });
});


Route::middleware('admin:admin')->prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


Route::middleware(['auth:sanctum,web', 'verified'])->group(function () {

    Route::get('/dashboard', [IndexController::class, 'dashboard'])->name('dashboard');

    Route::prefix('my')->group(function () {
        Route::get('/profile', [IndexController::class, 'user_profile'])->name('user.profile');
        Route::get('/orders', [OrderController::class, 'my_orders'])->name('my.orders');
        Route::get('/return/orders', [OrderDetailController::class, 'my_return_orders'])->name('my.return.orders');
        Route::get('/cancelled/orders', [OrderDetailController::class, 'my_cancelled_orders'])->name('my.cancel.orders');
        Route::get('/order/detail/{order_number}', [OrderDetailController::class, 'order_detail'])->name('my_order.detail');
        Route::post('/profile/update', [IndexController::class, 'user_update'])->name('user.update');
        Route::get('/change/password', [IndexController::class, 'change_password'])->name('change.password');
        Route::post('/update/password', [IndexController::class, 'update_password'])->name('update.password');
        Route::get('/return/order/{orderDetail}', [OrderController::class, 'return_order'])->name('return_order');
        Route::get('/cancel/order/{order}', [OrderController::class, 'cancel_order'])->name('cancel.order');
    });


    //------------------------User Wishlist ------------------------
    Route::prefix('wishlist')->group(function () {
        Route::get('/', [WishListController::class, 'index'])->name('user.wishlist');
        Route::post('/product/add/{id}', [WishListController::class, 'Add'])->name('add.wishlist');
        Route::get('/remove/{id}', [WishListController::class, 'remove'])->name('user.wishlist.remove');
    });


    //------------------------User Cart ------------------------
    Route::prefix('cart')->group(function () {
        Route::get('/mycart', [CartController::class, 'index'])->name('mycart');
        Route::get('/remove/{id}', [CartController::class, 'Remove'])->name('user.cart.remove');
        Route::get('/apply/coupon', [CartController::class, 'Apply_Coupon'])->name('apply.coupon');
        Route::get('/coupon/calculate', [CartController::class, 'Coupon_Calculate'])->name('apply.coupon.calculate');
        Route::get('/coupon/remove', [CartController::class, 'Coupon_Remove'])->name('coupon.remove');
        Route::get('/checkout', [CheckoutController::class, 'index'])->name('coupon.checkout');
        Route::post('/order/create', [OrderController::class, 'index'])->name('order.create');
    });
});


Route::get('/product/detail/{slug}', [HomeController::class, 'product_detail'])->name('user.product.detail');
Route::get('/tags/{tag}', [HomeController::class, 'tags'])->name('user.tags');
Route::get('/subcategory/{slug}/products', [HomeController::class, 'subcategory'])->name('user.subcategory');
Route::get('/sub/subcategory/{slug}/products', [HomeController::class, 'subsubcategory'])->name('user.subsubcategory');
Route::get('/product/view/modal/{id}', [HomeController::class, 'ajax_product_modal'])->name('ajax.product.modal');
Route::get('/product/addtocart/{id}', [CartController::class, 'AddToCart'])->name('addtocart');
Route::get('/product/mini/cart', [CartController::class, 'AddMiniCart'])->name('add.miniCart');
Route::get('/product/mini/cart/remove/{rowId}', [CartController::class, 'RemoveMiniCart'])->name('remove.miniCart');

Route::redirect('/web/dashboard', '/dashboard', 301);


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/logout', [IndexController::class, 'log_out'])->name('user.logout');
