<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ClientController::class, 'home'])->name('home');
Route::get('/about-us', [ClientController::class, 'about_us'])->name('about-us');
Route::get('/contact', [ClientController::class, 'contact'])->name('contact');
Route::middleware(['auth'])->group(function () {
    Route::get('shoppingCarts', [ShoppingCartController::class, 'index'])->name('shoppingCarts.index');
    Route::get('shoppingCarts/{course_id}', [ShoppingCartController::class, 'store'])->name('shoppingCarts.store');
    Route::get('shoppingCarts/{course_id}/destroy', [ShoppingCartController::class, 'destroy'])->name('shoppingCarts.destroy');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/confirmation/{id}', [TransactionController::class, 'confirmation'])->name('confirmation');
    Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
    Route::get('/enrolled_courses', [ClientController::class, 'enrolled_courses'])->name('enrolled_courses');
    Route::get('/enrolled_courses/{id}', [ClientController::class, 'detail_enrolled_courses'])->name('detail_enrolled_courses');
    Route::get('/download/{id}', [ClientController::class, 'downloadVideo'])->name('download_video');
    Route::get('/history_purchases', [ClientController::class, 'history_purchases'])->name('history_purchases');
    Route::get('/history_purchases/detail/{id}', [ClientController::class, 'history_purchases_detail'])->name('history_purchases_detail');
    Route::get('/settings', [ClientController::class, 'settings'])->name('settings');
    Route::put('/updateProfile', [CustomerController::class, 'update'])->name('updateProfile');
});

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/filter_top_courses', [DashboardController::class, 'filterTopCourses'])->name('filter_top_courses');
    Route::resource('about_us', ProfileController::class)->only('index', 'store', 'update');
    Route::resource('courses', CourseController::class);
    Route::resource('customers', CustomerController::class);
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/{id}/{status}', [TransactionController::class, 'update'])->name('transactions.update');
});
