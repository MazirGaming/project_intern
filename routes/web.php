<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', fn () => view('welcome'));
Route::get('email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verifycation.verify');
Auth::routes(['verify' => true]);


Route::prefix('admin')->middleware(['auth', 'admin.check'])->group(function () {
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::get('/change-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'showForm'])->name('form.change.password');
    Route::post('/update-password', [App\Http\Controllers\Auth\ConfirmPasswordController::class, 'updatePassword'])->name('update.password');
    Route::resource('course', App\Http\Controllers\Admin\CourseController::class);
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});
Route::get('/course/{course}', [App\Http\Controllers\Admin\CourseController::class, 'show'])->name('course.show');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.list');
Route::get('/add-to-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.update');
Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkOut'])->name('cart.check.out')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
