<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseController;
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

Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/about_us', function() {
        return view('admin.about_us');
    })->name('about_us');
    Route::resource('courses', CourseController::class);
    Route::get('/customers', function() {
        return view('admin.customers.index');
    })->name('customers');
    Route::get('/transactions', function() {
        return view('admin.transactions.index');
    })->name('transactions');
});
