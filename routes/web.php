<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('email/verify/{id}/{hash}', [VerificationController::class,'verify'])->name('verifycation.verify');
Auth::routes(['verify' => true]);


Route::prefix('admin')->middleware(['auth', 'admin.check'])->group(function () {
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
