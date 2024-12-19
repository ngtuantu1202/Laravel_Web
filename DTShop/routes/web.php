<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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

                                        /* ADMIN */
//home
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.show_dashboard');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Category
    Route::get('/add-category', [CategoryController::class, 'add_category'])->name('admin.add-category');
    Route::get('/all-category', [CategoryController::class, 'all_category'])->name('admin.all-category');
    Route::post('/save-category', [CategoryController::class, 'save_category']);

    Route::get('/active-category/{categories_id}', [CategoryController::class, 'active_category']);
    Route::get('/unactive-category/{categories_id}', [CategoryController::class, 'unactive_category']);

    Route::get('/edit-category/{categories_id}', [CategoryController::class, 'edit_category']);
    Route::get('/delete-category/{categories_id}', [CategoryController::class, 'delete_category']);
    Route::post('/update-category/{categories_id}', [CategoryController::class, 'update_category']);
    // Brand
    Route::get('/add-brand', [BrandController::class, 'add_brand'])->name('admin.add-brand');
    Route::get('/all-brand', [BrandController::class, 'all_brand'])->name('admin.all-brand');
    Route::post('/save-brand', [BrandController::class, 'save_brand']);

    Route::get('/active-brand/{brand_id}', [BrandController::class, 'active_brand']);
    Route::get('/unactive-brand/{brand_id}', [BrandController::class, 'unactive_brand']);

    Route::get('/edit-brand/{brand_id}', [BrandController::class, 'edit_brand']);
    Route::get('/delete-brand/{brand_id}', [BrandController::class, 'delete_brand']);
    Route::post('/update-brand/{brand_id}', [BrandController::class, 'update_brand']);
    // Product
//    Route::get('/add-product', [ProductController::class, 'add_product'])->name('admin.add-product');
//    Route::get('/all-product', [ProductController::class, 'all_product'])->name('admin.all-product');
});



//Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
//Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.dashboard');
//Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
////add category
//Route::get('/add-category', [CategoryController::class, 'add_category'])->name('admin.add-category');
//Route::get('/all-category', [CategoryController::class, 'all_category'])->name('admin.all-category');
////add product
//Route::get('/add-product', [ProductController::class, 'add_product'])->name('admin.add-product');
//Route::get('/all-product', [ProductController::class, 'all_product'])->name('admin.all-product');
