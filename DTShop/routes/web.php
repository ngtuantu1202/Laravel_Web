<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
//Route::middleware('auth')->group(function () {
//    Route::get('/', [HomeController::class, 'index'])->name('home.index');
//    Route::get('/trang-chu', [HomeController::class, 'index'])->name('home.trang-chu');
//    // Các route khác của người dùng
//});
//Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
//    Route::post('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//    Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.show_dashboard');
//    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
//
//    Route::get('/add-category', [CategoryController::class, 'add_category'])->name('admin.add-category');
//    Route::get('/all-category', [CategoryController::class, 'all_category'])->name('admin.all-category');
//    Route::post('/save-category', [CategoryController::class, 'save_category']);
//    Route::get('/active-category/{categories_id}', [CategoryController::class, 'active_category']);
//    Route::get('/unactive-category/{categories_id}', [CategoryController::class, 'unactive_category']);
//    Route::get('/edit-category/{categories_id}', [CategoryController::class, 'edit_category']);
//    Route::get('/delete-category/{categories_id}', [CategoryController::class, 'delete_category']);
//    Route::post('/update-category/{categories_id}', [CategoryController::class, 'update_category']);
//});




                                        /* USER */
//home
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/trang-chu', [HomeController::class, 'index'])->name('home.trang-chu');
//loai san pham
Route::get('/loai-san-pham/{categoried_id}', [CategoryController::class, 'showCategoryHome'])->name('home.loai-san-pham');
//hieu sp
Route::get('/hieu-san-pham/{brand_id}', [BrandController::class, 'showBrandHome'])->name('home.hieu-san-pham');




                                        /* ADMIN */
//home
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.show_dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Category
    Route::get('/add-category', [CategoryController::class, 'add_category'])->name('category.add');
    Route::get('/all-category', [CategoryController::class, 'all_category'])->name('category.all');
    Route::post('/save-category', [CategoryController::class, 'save_category'])->name('category.save');
    Route::get('/active-category/{categories_id}', [CategoryController::class, 'active_category'])->name('category.active');
    Route::get('/unactive-category/{categories_id}', [CategoryController::class, 'unactive_category'])->name('category.unactive');
    Route::get('/edit-category/{categories_id}', [CategoryController::class, 'edit_category'])->name('category.edit');
    Route::get('/delete-category/{categories_id}', [CategoryController::class, 'delete_category'])->name('category.delete');
    Route::post('/update-category/{categories_id}', [CategoryController::class, 'update_category'])->name('category.update');

    // Brand
    Route::get('/add-brand', [BrandController::class, 'add_brand'])->name('brand.add');
    Route::get('/all-brand', [BrandController::class, 'all_brand'])->name('brand.all');
    Route::post('/save-brand', [BrandController::class, 'save_brand'])->name('brand.save');
    Route::get('/active-brand/{brand_id}', [BrandController::class, 'active_brand'])->name('brand.active');
    Route::get('/unactive-brand/{brand_id}', [BrandController::class, 'unactive_brand'])->name('brand.unactive');
    Route::get('/edit-brand/{brand_id}', [BrandController::class, 'edit_brand'])->name('brand.edit');
    Route::get('/delete-brand/{brand_id}', [BrandController::class, 'delete_brand'])->name('brand.delete');
    Route::post('/update-brand/{brand_id}', [BrandController::class, 'update_brand'])->name('brand.update');

    // Product
    Route::get('/add-product', [ProductController::class, 'add_product'])->name('product.add');
    Route::get('/all-product', [ProductController::class, 'all_product'])->name('product.all');
    Route::post('/save-product', [ProductController::class, 'save_product'])->name('product.save');
    Route::get('/active-product/{product_id}', [ProductController::class, 'active_product'])->name('product.active');
    Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('product.unactive');
    Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product'])->name('product.edit');
    Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product'])->name('product.delete');
    Route::post('/update-product/{product_id}', [ProductController::class, 'update_product'])->name('product.update');

});
