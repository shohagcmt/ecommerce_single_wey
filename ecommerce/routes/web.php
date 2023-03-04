<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController,
    CategoryController,SubCategoryController,OrdersController,ProductController,};
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ClientController;

/*Route::get('/', function () {
    return view('user.layouts.template');
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Home controller
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Index')->name('Home');
    
});
//User Controller
Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
   
    
});
//User  Auth Controller
Route::middleware(['auth', 'role:user'])->group(function () { 
    Route::controller(ClientController::class)->group(function () {
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::post('/add_product_to_cart', 'AddProductToCart')->name('addproducttocart');
        Route::get('/cart_remove/{id}', 'CardRemove')->name('cardremove');
        Route::get('/shipping_address', 'GetShippingAddress')->name('shippingaddress');
        Route::post('/add_shipping_address', 'AddShippingAddress')->name('addshippingaddress');
        Route::get('/check-out', 'CheckOut')->name('checkout');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/pending-orders', 'PendingOrders')->name('userpendingorders');
        Route::get('/history', 'History')->name('history');
        Route::get('/new-release', 'NewRelease')->name('newrelease');
        Route::get('/todays-deal', 'TodaysDeal')->name('todaysdeal');
        Route::get('/customer-service', 'CustomerService')->name('customerservice');
        
    });
});
//Admin Controller
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
        
    });
    //Category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category/{id}', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });
    //SubCategory
     Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory', 'StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}', 'EditSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory/{id}', 'UpdateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}', 'DeleteSubCategory')->name('deletesubcategory');
    });
    //Product
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-product', 'Index')->name('allproduct');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-image/{id}', 'EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-image/{id}', 'UpdateImgProduct')->name('update_product_img');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('/admin/update-product/{id}', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
    }); 
    //Orders
    Route::controller(OrdersController::class)->group(function () {
        Route::get('/admin/pending-orders', 'Index')->name('pendingorders');
        Route::get('/admin/confirm-orders/{id}', 'Confirm')->name('confirm');
    });
   
    

});