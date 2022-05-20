<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\PageViewController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;


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
Route::get('/', [PageViewController::class, 'home'])->name('home');
Route::get('/view-details/{id}', [PageViewController::class, 'viewDetails'])->name('view-details');
Route::get('/product_by_cat/{id}', [PageViewController::class, 'productByCat'])->name('product_by_cat');
Route::get('/product_by_subcat/{id}', [PageViewController::class, 'productBySubCat'])->name('product_by_subcat');
Route::get('/product_by_brand/{id}', [PageViewController::class, 'productByBrand'])->name('product_by_brand');
Route::get('/search', [PageViewController::class, 'Search'])->name('search');


//Add to cart route
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');


//Checkout route
Route::get('/checkout', [CheckoutController::class, 'checkoutIndex'])->name('checkout');
Route::get('/login-check', [CheckoutController::class, 'loginCheck'])->name('login-check');


//customer login,registration,logout route
Route::post('/customer-login', [CustomerController::class, 'customerLogin'])->name('customer-login');
Route::post('/customer-registration', [CustomerController::class, 'customerRegistration'])->name('customer-registration');
Route::get('/customer-logout', [CustomerController::class, 'customerLogout'])->name('customer-logout');

Route::post('/save-shipping-address', [CheckoutController::class, 'saveShippingAddress'])->name('save-shipping-address');
Route::get('/payment', [CheckoutController::class, 'Payment'])->name('payment');
Route::post('/order-place', [CheckoutController::class, 'orderPlace'])->name('order-place');

//Admin Order route...
Route::get('/manage-order', [OrderController::class, 'manageOrder'])->name('manage-order');
Route::get('/view-order/{id}', [OrderController::class, 'viewOrder'])->name('view-order');




// Category Module
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/add-category',[CategoryController::class, 'addCategory'])->name('add-category');
    Route::post('/new-category', [CategoryController::class, 'newCategory'])->name('new-category');
    Route::get('/manage-category', [CategoryController::class, 'manageCategory'])->name('manage-category');
    Route::get('/change-status-category/{id}', [CategoryController::class, 'changeStatusCategory'])->name('change-status-category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
    Route::post('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');


//   Sub Category Module
    Route::get('/add-sub-category',[SubCategoryController::class, 'addSubCategory'])->name('add-sub-category');
    Route::post('/new-sub-category', [SubCategoryController::class, 'newSubCategory'])->name('new-sub-category');
    Route::get('/manage-sub-category', [SubCategoryController::class, 'manageSubCategory'])->name('manage-sub-category');
    Route::get('/change-status-sub-category/{id}', [SubCategoryController::class, 'changeStatusSubCategory'])->name('change-status-sub-category');
    Route::get('/edit-sub-category/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit-sub-category');
    Route::post('/update-sub-category/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('update-sub-category');
    Route::get('/delete-sub-category/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete-sub-category');

//    Brand Mudule Routes
    Route::get('/add-brand',[BrandController::class, 'addBrand'])->name('add-brand');
    Route::post('/new-brand', [BrandController::class, 'newBrand'])->name('new-brand');
    Route::get('/manage-brand', [BrandController::class, 'manageBrand'])->name('manage-brand');
    Route::get('/change-status-brand/{id}', [BrandController::class, 'changeStatusBrand'])->name('change-status-brand');
    Route::get('/edit-brand/{id}', [BrandController::class, 'editBrand'])->name('edit-brand');
    Route::post('/update-brand/{id}', [BrandController::class, 'updateBrand'])->name('update-brand');
    Route::get('/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete-brand');


//    Unit Mudule Routes
    Route::get('/add-unit',[UnitController::class, 'addUnit'])->name('add-unit');
    Route::post('/new-unit', [UnitController::class, 'newUnit'])->name('new-unit');
    Route::get('/manage-unit', [UnitController::class, 'manageUnit'])->name('manage-unit');
    Route::get('/change-status-unit/{id}', [UnitController::class, 'changeStatusUnit'])->name('change-status-unit');
    Route::get('/edit-unit/{id}', [UnitController::class, 'editUnit'])->name('edit-unit');
    Route::post('/update-unit/{id}', [UnitController::class, 'updateUnit'])->name('update-unit');
    Route::get('/delete-unit/{id}', [UnitController::class, 'deleteUnit'])->name('delete-unit');


//    Size Module Routes
    Route::get('/add-size',[SizeController::class, 'addSize'])->name('add-size');
    Route::post('/new-size', [SizeController::class, 'newSize'])->name('new-size');
    Route::get('/manage-size', [SizeController::class, 'manageSize'])->name('manage-size');
    Route::get('/change-status-size/{id}', [SizeController::class, 'changeStatusSize'])->name('change-status-size');
    Route::get('/edit-size/{id}', [SizeController::class, 'editSize'])->name('edit-size');
    Route::post('/update-size/{id}', [SizeController::class, 'updateSize'])->name('update-size');
    Route::get('/delete-size/{id}', [SizeController::class, 'deleteSize'])->name('delete-size');

//    Color Module Routes
    Route::get('/add-color',[ColorController::class, 'addColor'])->name('add-color');
    Route::post('/new-color', [ColorController::class, 'newColor'])->name('new-color');
    Route::get('/manage-color', [ColorController::class, 'manageColor'])->name('manage-color');
    Route::get('/change-status-color/{id}', [ColorController::class, 'changeStatusColor'])->name('change-status-color');
    Route::get('/edit-color/{id}', [ColorController::class, 'editColor'])->name('edit-color');
    Route::post('/update-color/{id}', [ColorController::class, 'updateColor'])->name('update-color');
    Route::get('/delete-color/{id}', [ColorController::class, 'deleteColor'])->name('delete-color');

//    Product Module Routes
    Route::get('/add-product',[ProductController::class, 'addProduct'])->name('add-product');
    Route::post('/new-product', [ProductController::class, 'newProduct'])->name('new-product');
    Route::get('/manage-product', [ProductController::class, 'manageProduct'])->name('manage-product');
    Route::get('/change-status-product/{id}', [ProductController::class, 'changeStatusProduct'])->name('change-status-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home.home');
    })->name('home');
});

