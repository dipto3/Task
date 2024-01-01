<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'home'])->name('home');

Route::get('/admin/login', [LoginController::class, 'login'])->name('login');
Route::post('/admin/login-check', [LoginController::class, 'login_check'])->name('login.check');

Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Your admin routes go here
    //category routes...
    Route::resource('categories',CategoryController ::class);
    Route::post('/change-status', [CategoryController::class, 'change_status'])->name('status');
    //producty routes...
    Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::post('/change-product-status', [ProductController::class, 'change_status'])->name('product.status');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/remove-product/{id}', [ProductController::class, 'remove'])->name('product.remove');
    Route::get('/export-products', [ProductController::class, 'export'])->name('export');
    Route::post('/import-products', [ProductController::class, 'import'])->name('import');
});
require __DIR__.'/auth.php';
