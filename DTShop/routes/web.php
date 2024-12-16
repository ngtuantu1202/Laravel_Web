<?php

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

//user
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/trang-chu', [HomeController::class, 'index'])->name('home.trang-chu');

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('admin.dashboard');
Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
