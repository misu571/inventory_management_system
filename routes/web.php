<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Loged in user's profile
    // Route::group(['prefix' => '/profile', 'as' => 'profile.'], function () {
    //     Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
    //     Route::post('/password-update', [App\Http\Controllers\ProfileController::class, 'passwordUpdate'])->name('password.update');
    // });

    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resources([
        'employee' => App\Http\Controllers\EmployeeController::class,
        'customer' => App\Http\Controllers\CustomerController::class,
        'supplier' => App\Http\Controllers\SupplierController::class,
        'salary' => App\Http\Controllers\SalaryController::class,
    ]);
});
